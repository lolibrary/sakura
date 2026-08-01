<?php

namespace App\Filament\Resources\Items\Pages;

use App\Filament\Components\Actions\ReplicateItemAction;
use App\Filament\Resources\Items\ItemResource;
use App\Jobs\MarkAsDraft;
use App\Jobs\PublishItem;
use App\Jobs\ReadyForReview;
use App\Jobs\RequestChanges;
use App\Jobs\UnpublishItem;
use App\Models\Attribute;
use App\Models\Item;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\DB;

class ViewItem extends ViewRecord
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->icon(Heroicon::OutlinedPencilSquare),

            Action::make('ready_for_review')
                ->icon(Heroicon::OutlinedClipboardDocumentCheck)
                ->color('light')
                ->authorize('readyForReview')
                ->tooltip('Flag this entry to senior volunteers to check over')
                ->action(fn() => dispatch(new ReadyForReview($this->record, auth()->user())) && $this->fillForm()),
            Action::make('mark_as_draft')
                ->icon(Heroicon::OutlinedDocument)
                ->color('gray')
                ->authorize('markAsDraft')
                ->tooltip('Mark this entry as no longer ready for review')
                ->action(fn() => dispatch(new MarkAsDraft($this->record, auth()->user())) && $this->fillForm()),
            Action::make('request_changes')
                ->icon(Heroicon::OutlinedChatBubbleLeftEllipsis)
                ->color('warning')
                ->authorize('requestChanges')
                ->action(fn() => dispatch(new RequestChanges($this->record, auth()->user())) && $this->fillForm()),

            ActionGroup::make([
                ReplicateItemAction::make()
                    ->color('fuschia')
                    ->tooltip('Copies an item, minus the images, with a new name'),
                Action::make('unpublish')
                    ->icon(Heroicon::OutlinedArchiveBoxXMark)
                    ->color('danger')
                    ->authorize('unpublish')
                    ->tooltip('Remove an entry from the main lolibrary.org site')
                    ->action(fn() => dispatch(new UnpublishItem($this->record, auth()->user())) && $this->fillForm()),
                Action::make('publish')
                    ->icon(Heroicon::OutlinedCheckBadge)
                    ->color('success')
                    ->authorize('publish')
                    ->action(fn() => dispatch(new PublishItem($this->record, auth()->user())) && $this->fillForm()),
            ]),
        ];
    }
}
