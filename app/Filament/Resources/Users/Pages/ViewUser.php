<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Password;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('verify')
                ->requiresConfirmation()
                ->icon(Heroicon::OutlinedCheckBadge)
                ->color('success')
                ->authorize('verify')
                ->action(fn (User $record) => $record->markEmailAsVerified()),
            Action::make('reset_password')
                ->label(__('ui.auth.pw_reset'))
                ->requiresConfirmation()
                ->icon(Heroicon::OutlinedEnvelopeOpen)
                ->color('light')
                ->authorize('reset')
                ->action(fn (User $record) => Password::broker()->sendResetLink(['id' => $record->id])),

            ActionGroup::make([
                Action::make('allow_username_change')
                    ->tooltip('Flag this user as able to change username')
                    ->icon(Heroicon::OutlinedFlag)
                    ->action(fn (User $record) => $record->metadata->put('can_change_username', true) && $record->save()),
            ]),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (! auth()->user()?->can('viewEmail', $this->record)) {
            $data['email'] = '[redacted]';
        }

        return $data;
    }
}
