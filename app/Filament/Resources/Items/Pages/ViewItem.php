<?php

namespace App\Filament\Resources\Items\Pages;

use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\Items\ItemResource;
use App\Jobs\MarkAsDraft;
use App\Jobs\PublishItem;
use App\Jobs\ReadyForReview;
use App\Jobs\RequestChanges;
use App\Jobs\UnpublishItem;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Support\Icons\Heroicon;

class ViewItem extends ViewRecord
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->icon(Heroicon::OutlinedPencilSquare),
            ReplicateAction::make()
                ->icon(Heroicon::OutlinedClipboardDocument)
                ->color('gray'),
            Action::make('publish')
                ->requiresConfirmation()
                ->icon(Heroicon::OutlinedCheckBadge)
                ->color('gray')
                ->authorize('publish')
                ->action(fn() => dispatch(new PublishItem($this->record, auth()->user())) && $this->fillForm()),
            Action::make('unpublish')
                ->requiresConfirmation()
                ->icon(Heroicon::OutlinedArchiveBoxXMark)
                ->color('gray')
                ->authorize('unpublish')
                ->action(fn() => dispatch(new UnpublishItem($this->record, auth()->user())) && $this->fillForm()),
            Action::make('ready_for_review')
                ->icon(Heroicon::OutlinedCheckBadge)
                ->color('gray')
                ->authorize('readyForReview')
                ->action(fn() => dispatch(new ReadyForReview($this->record, auth()->user())) && $this->fillForm()),
            Action::make('mark_as_draft')
                ->icon(Heroicon::OutlinedCheckBadge)
                ->color('gray')
                ->authorize('markAsDraft')
                ->action(fn() => dispatch(new MarkAsDraft($this->record, auth()->user())) && $this->fillForm()),
            Action::make('request_changes')
                ->icon(Heroicon::OutlinedCheckBadge)
                ->color('gray')
                ->authorize('requestChanges')
                ->action(fn() => dispatch(new RequestChanges($this->record, auth()->user())) && $this->fillForm()),
        ];
    }
}
