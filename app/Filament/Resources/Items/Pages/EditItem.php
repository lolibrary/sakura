<?php

namespace App\Filament\Resources\Items\Pages;

use App\Filament\Resources\Items\ItemResource;
use App\Models\Item;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Relaticle\Comments\Filament\Actions\CommentsAction;

class EditItem extends EditRecord
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            CommentsAction::make(),
        ];
    }

    /**
     * @return array<Action | ActionGroup>
     */
    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction(),
            $this->getCancelFormAction(),
            Action::make('view')
                ->label('Back to Entry')
                ->color('fuschia')
                ->successRedirectUrl(fn (Item $record) => $record->view_url),
        ];
    }
}
