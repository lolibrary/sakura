<?php

namespace App\Filament\Resources\Items\Pages;

use App\Filament\Resources\Items\ItemResource;
use App\Models\Item;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Icons\Heroicon;
use Relaticle\Comments\Filament\Actions\CommentsAction;

class EditItem extends EditRecord
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            CommentsAction::make(),

            ActionGroup::make([
                Action::make('wiki')
                    ->color('gray')
                    ->icon(Heroicon::OutlinedQuestionMarkCircle)
                    ->label('Wiki: Entry Help')
                    ->tooltip('A comprehensive guide on how to add an entry to Lolibrary, on our wiki.')
                    ->url('https://wiki.lolibrary.org/index.php?title=Lolibrary_Entries:_Creating_an_Item')
                    ->openUrlInNewTab(),
                DeleteAction::make(),
            ])
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
