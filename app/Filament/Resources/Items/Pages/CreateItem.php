<?php

namespace App\Filament\Resources\Items\Pages;

use App\Filament\Resources\Items\ItemResource;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
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
            ActionGroup::make([
                Action::make('discord')
                    ->color('gray')
                    ->icon(Heroicon::OutlinedChatBubbleLeftEllipsis)
                    ->label('Discord')
                    ->tooltip('Feel free to join our discord if you need help, or to chat about your entry!')
                    ->url(config('app.discord.invite-link'))
                    ->openUrlInNewTab(),
            ]),
        ];
    }
}
