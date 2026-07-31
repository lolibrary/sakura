<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Jobs\UnpublishItem;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;

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
                ->action(fn(User $record) => $record->markEmailAsVerified()),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (!auth()->user()?->can('viewEmail', $this->record)) {
            $data['email'] = '[redacted]';
        }

        return $data;
    }
}
