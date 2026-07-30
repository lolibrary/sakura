<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Settings;
use CraftForge\FilamentLanguageSwitcher\FilamentLanguageSwitcherPlugin;
use Doriiaan\FilamentAstrotomic\FilamentAstrotomicPlugin;
use Filament\Actions\Action;
use Filament\Enums\UserMenuPosition;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Size;
use Filament\Support\Icons\Heroicon;
use Filament\View\PanelsRenderHook;
use Filament\Widgets\AccountWidget;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('library')
            ->login()
            ->brandLogo(asset('images/logo_horizontal.png'))
            ->darkModeBrandLogo(asset('images/logo_horizontal_white.png'))
            ->brandLogoHeight('1.3rem')
            ->colors([
                'primary' => Color::Indigo,
                'info' => Color::Olive,
                'success' => Color::Teal,
                'warning' => Color::Orange,
                'danger' => Color::Rose,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
            ])
            ->databaseNotifications()
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                EnsureEmailIsVerified::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->userMenuItems([
                [
                    Action::make('level')
                        ->badgeColor(fn() => auth()->user()->level->getColor())
                        ->badge(fn() => auth()->user()->level->getLabel())
                        ->label('Level')
                        ->badgeTooltip(fn() => auth()->user()->level->getDescription()),
                ],
                [
                    Action::make('wiki')
                        ->url('https://wiki.lolibrary.org')
                        ->icon(Heroicon::OutlinedBookOpen)
                        ->openUrlInNewTab(),
                    Action::make('Back to Site')
                        ->url('/')
                        ->icon(Heroicon::OutlinedArrowTopRightOnSquare)
                        ->openUrlInNewTab(),
                ],
                [
                    Action::make('settings')
                        ->url(fn (): string => Settings::getUrl())
                        ->icon('heroicon-o-cog-6-tooth'),
                ],
            ])
            ->plugins([
                FilamentLanguageSwitcherPlugin::make()
                    ->locales([
                        'en', 'fr', 'it', 'no', 'nl', // our usual
                        'de', 'ja', 'es', 'pt', // some more extras for the backend
                        ])
                    ->rememberLocale()
                    ->showFlags(false),
                FilamentAstrotomicPlugin::make(),
            ])
            ->globalSearchResourceOptIn();
    }
}
