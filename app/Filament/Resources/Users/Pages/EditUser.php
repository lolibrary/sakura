<?php

namespace App\Filament\Resources\Users\Pages;

use App\Enums\Level;
use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Security: All non-`$hidden` model attributes are sent to the
        // browser via Livewire. Override this to `unset()` sensitive
        // attributes (API keys, internal flags, etc.). Only form
        // field attributes are writable — not a mass assignment
        // issue, but a data exposure concern.

        $data['name'] = $data['display_name'];
        unset($data['display_name']);

        return $data;
    }

    /**
     * @param Model|\App\Models\User $record
     * @param array $data
     * @return Model
     */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if (auth()->user()->level->value >= $data['level']) {
            $record->level = Level::from($data['level']);
        }

        $record->banned = $data['banned'];

        $record->update($data);

        return $record;
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
