<?php

namespace App\Filament\Resources\Items\Pages;

use App\Enums\Status;
use App\Filament\Components\Actions\ReplicateItemAction;
use App\Filament\Resources\Items\ItemResource;
use App\Jobs\MarkAsActive;
use App\Jobs\MarkAsDraft;
use App\Jobs\MarkAsDuplicate;
use App\Jobs\PublishItem;
use App\Jobs\ReadyForReview;
use App\Jobs\RequestChanges;
use App\Jobs\RetractItem;
use App\Models\Item;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;

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
                ->action(fn(Item $record) => dispatch_sync(new ReadyForReview($record, auth()->user()))),
            Action::make('mark_as_draft')
                ->icon(Heroicon::OutlinedDocument)
                ->color('gray')
                ->authorize('markAsDraft')
                ->tooltip('Mark this entry as no longer ready for review')
                ->action(fn(Item $record) => dispatch_sync(new MarkAsDraft($record, auth()->user()))),
            Action::make('request_changes')
                ->icon(Heroicon::OutlinedChatBubbleLeftEllipsis)
                ->color('warning')
                ->authorize('requestChanges')
                ->requiresConfirmation(fn() => $this->record->status === Status::ChangesRequested)
                ->action(fn(Item $record) => dispatch_sync(new RequestChanges($record, auth()->user()))),

            Action::make('mark_as_active')
                ->icon(Heroicon::OutlinedClock)
                ->color('gray')
                ->tooltip('Mark an inactive draft as active')
                ->authorize('markAsActive')
                ->action(fn(Item $record) => dispatch_sync(new MarkAsActive($record, auth()->user())))
                ->successRedirectUrl(fn(Item $record) => $record->view_url),

            ActionGroup::make([
                ReplicateItemAction::make()
                    ->color('fuschia')
                    ->tooltip('Copies an item, minus the images, with a new name')
                    ->schema([
                        TextInput::make('english_name')
                            ->maxLength(255)
                            ->required()
                            ->live()
                            ->afterStateUpdated(
                                fn($state, callable $set) => $set('slug', $this->record->brand->short_name . '-' . str($state)->slug())
                            ),
                        TextInput::make('slug')
                            ->disabled()
                            ->required()
                            ->unique(Item::class, 'slug'),
                    ]),
                Action::make('retract')
                    ->requiresConfirmation()
                    ->modalHeading('Retract Item')
                    ->modalDescription("This was previously called 'unpublish'.\n" .
                        "This removes an entry from the main site's search, while keeping the direct link intact.\n" .
                        "This is required as a first step in order to delete an entry.")
                    ->icon(Heroicon::OutlinedArchiveBoxXMark)
                    ->color('danger')
                    ->authorize('retract')
                    ->tooltip('Remove an entry from the main lolibrary.org site')
                    ->action(fn(Item $record) => dispatch_sync(new RetractItem($record, auth()->user()))),
                Action::make('publish')
                    ->icon(Heroicon::OutlinedCheckBadge)
                    ->label('Publish entry')
                    ->color('success')
                    ->authorize('publish')
                    ->action(fn(Item $record) => dispatch_sync(new PublishItem($record, auth()->user()))),
                Action::make('mark_as_duplicate')
                    ->icon(Heroicon::OutlinedDocumentDuplicate)
                    ->color('primary')
                    ->tooltip('Mark an item as a duplicate of another')
                    ->authorize('markAsDuplicate')
                    ->schema([
                        TextInput::make('id')
                            ->label(__('ID'))
                            ->uuid()
                            ->exists(Item::class, 'id')
                            ->helperText("Enter the ID (copy from the page) of the entry to mark this as a duplicate of.")
                    ])
                    ->action(function (Item $record, array $data, Action $action): void {
                        /** @var $item Item */
                        if (is_null($item = Item::find($data['id']))) {
                            $action->halt();
                        }

                        if (dispatch_sync(new MarkAsDuplicate($record, $item))) {
                            $this->fillForm();

                            $action->cancel();
                        }

                        $action->success();
                    })
                    ->successRedirectUrl(fn(Item $record) => $record->view_url),
                DeleteAction::make(),
            ]),
        ];
    }
}
