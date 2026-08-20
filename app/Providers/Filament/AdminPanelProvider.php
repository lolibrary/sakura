<?php

namespace App\Providers\Filament;

use App\Filament\Providers\GravatarProvider;
use CraftForge\FilamentLanguageSwitcher\FilamentLanguageSwitcherPlugin;
use Doriiaan\FilamentAstrotomic\FilamentAstrotomicPlugin;
use Filament\Actions\Action;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Platform;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\AccountWidget;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Relaticle\Comments\CommentsPlugin;

class AdminPanelProvider extends PanelProvider
{
    public const Zinc = [
        50 => 'oklch(0.985 0 0)',
        100 => 'oklch(0.967 0.001 286.375)',
        200 => 'oklch(0.92 0.004 286.32)',
        300 => 'oklch(0.871 0.006 286.286)',
        400 => 'oklch(0.705 0.015 286.067)',
        500 => 'oklch(0.552 0.016 285.938)',
        600 => 'oklch(0.442 0.017 285.786)',
        700 => 'oklch(0.37 0.013 285.805)',
        800 => 'oklch(0.274 0.006 286.033)',
        900 => 'oklch(0.21 0.006 285.885)',
        950 => 'oklch(0.215 0.005 285.8)',
    ];

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('library')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->login()
            ->brandLogo(asset('images/logo_horizontal.png'))
            ->darkModeBrandLogo(asset('images/logo_horizontal_white.png'))
            ->brandLogoHeight('1.3rem')
            ->colors([
                'gray' => static::Zinc,
                'primary' => Color::Indigo,
                'info' => Color::Olive,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
                'danger' => Color::Rose,
                'purple' => Color::Purple,
                'light' => Color::Pink,
                'teal' => Color::Teal,
                'cyan' => Color::Cyan,
                'fuschia' => Color::Fuchsia,
            ])
            ->defaultAvatarProvider(GravatarProvider::class)
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
                        ->badgeColor(fn () => auth()->user()->level->getColor())
                        ->badge(fn () => auth()->user()->level->getLabel())
                        ->label('Level')
                        ->badgeTooltip(fn () => auth()->user()->level->getDescription()),
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
            ])
            ->plugins([
                FilamentLanguageSwitcherPlugin::make()
                    ->locales([
                        'en', 'fr', 'it', ['code' => 'nb_NO', 'name' => 'Norsk'], 'nl', // our usual
                        'de', 'ja', 'es', 'pt', 'pt_BR', 'zh', // some more extras for the backend
                    ])
                    ->rememberLocale()
                    ->showFlags(false),
                FilamentAstrotomicPlugin::make(),
                CommentsPlugin::make(),
            ])
            ->globalSearchResourceOptIn()
            ->globalSearchFieldKeyBindingSuffix()
            ->globalSearchFieldSuffix(fn (): ?string => match (Platform::detect()) {
                Platform::Windows, Platform::Linux => 'CTRL+K',
                Platform::Mac => '⌘+K',
                default => null,
            });
    }
}
