<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
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
                ->action(static function (User $record) {
                    if ($record->markEmailAsVerified()) {
                        Notification::make()
                            ->title('User verified')
                            ->success()
                            ->seconds(3)
                            ->send();
                    } else {
                        Notification::make()
                            ->title('Unable to verify user')
                            ->danger()
                            ->seconds(3)
                            ->send();
                    }

                }),
            Action::make('reset_password')
                ->label(__('ui.auth.pw_reset'))
                ->requiresConfirmation()
                ->icon(Heroicon::OutlinedEnvelopeOpen)
                ->color('light')
                ->authorize('reset')
                ->action(static function (User $record) {
                    Password::broker()->sendResetLink(['id' => $record->id]);

                    Notification::make()
                        ->title('Reset sent')
                        ->success()
                        ->seconds(3)
                        ->send();
                }),

            ActionGroup::make([
                Action::make('allow_username_change')
                    ->tooltip('Flag this user as able to change username')
                    ->icon(Heroicon::OutlinedFlag)
                    ->action(static function (User $record) {
                        $record->metadata->put('can_change_username', true);

                        if ($record->save()) {
                            Notification::make()
                                ->title('Username change allowed via admin')
                                ->success()
                                ->seconds(3)
                                ->send();
                        } else {
                            Notification::make()
                                ->title('Unable to update user')
                                ->danger()
                                ->seconds(3)
                                ->send();
                        }
                    }),
                DeleteAction::make(),
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
