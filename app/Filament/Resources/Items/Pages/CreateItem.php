<?php

namespace App\Filament\Resources\Items\Pages;

use App\Filament\Resources\Items\ItemResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Icons\Heroicon;

class CreateItem extends CreateRecord
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('wiki')
                ->color('gray')
                ->icon(Heroicon::OutlinedQuestionMarkCircle)
                ->label('Wiki: Entry Help')
                ->tooltip('A comprehensive guide on how to add an entry to Lolibrary, on our wiki.')
                ->url('https://wiki.lolibrary.org/index.php?title=Lolibrary_Entries:_Creating_an_Item')
                ->openUrlInNewTab(),
        ];
    }
}
