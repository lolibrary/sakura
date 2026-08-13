<?php

namespace App\Filament\Resources\Items\Pages;

use App\Enums\Status;
use App\Filament\Components\Actions\ReplicateItemAction;
use App\Filament\Resources\Items\ItemResource;
use App\Jobs\ChangeEntrySlug;
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
                ->label(trans('ui.actions.ready_for_review'))
                ->icon(Heroicon::OutlinedClipboardDocumentCheck)
                ->color('light')
                ->authorize('readyForReview')
                ->tooltip(trans('ui.actions.ready_for_review_help'))
                ->action(fn(Item $record) => dispatch_sync(new ReadyForReview($record, auth()->user()))),
            Action::make('mark_as_draft')
                ->label(trans('ui.actions.mark_as_draft'))
                ->icon(Heroicon::OutlinedDocument)
                ->color('gray')
                ->authorize('markAsDraft')
                ->tooltip(trans('ui.actions.mark_as_draft_help'))
                ->action(fn(Item $record) => dispatch_sync(new MarkAsDraft($record, auth()->user()))),
            Action::make('request_changes')
                ->label(trans('ui.actions.request_changes'))
                ->icon(Heroicon::OutlinedChatBubbleLeftEllipsis)
                ->color('warning')
                ->authorize('requestChanges')
                ->tooltip(trans('ui.actions.request_changes_help'))
                ->requiresConfirmation(fn() => $this->record->status === Status::Draft)
                ->action(fn(Item $record) => dispatch_sync(new RequestChanges($record, auth()->user()))),

            Action::make('mark_as_active')
                ->label(trans('ui.actions.mark_as_active'))
                ->icon(Heroicon::OutlinedClock)
                ->color('gray')
                ->tooltip(trans('ui.actions.mark_as_active_help'))
                ->authorize('markAsActive')
                ->action(fn(Item $record) => dispatch_sync(new MarkAsActive($record, auth()->user())))
                ->successRedirectUrl(fn(Item $record) => $record->view_url),

            ActionGroup::make([
                ReplicateItemAction::make()
                    ->label(trans('ui.actions.replicate'))
                    ->color('fuschia')
                    ->tooltip(trans('ui.actions.replicate'))
                    ->schema([
                        TextInput::make('english_name')
                            ->maxLength(255)
                            ->required()
                            ->live()
                            ->afterStateUpdated(fn($state, callable $set) => $set('slug', $this->slugify($state))),
                        TextInput::make('slug')
                            ->disabled()
                            ->required()
                            ->unique(Item::class, 'slug'),
                    ]),
                Action::make('retract')
                    ->label(trans('ui.actions.retract'))
                    ->requiresConfirmation()
                    ->modalHeading(trans('ui.actions.retract_heading'))
                    ->modalDescription(trans('ui.actions.retract_description'))
                    ->icon(Heroicon::OutlinedArchiveBoxXMark)
                    ->color('danger')
                    ->authorize('retract')
                    ->tooltip(trans('ui.actions.retract_help'))
                    ->action(fn(Item $record) => dispatch_sync(new RetractItem($record, auth()->user()))),
                Action::make('publish')
                    ->icon(Heroicon::OutlinedCheckBadge)
                    ->label(trans('ui.actions.publish'))
                    ->tooltip(trans('ui.actions.publish_help'))
                    ->color('success')
                    ->authorize('publish')
                    ->action(fn(Item $record) => dispatch_sync(new PublishItem($record, auth()->user()))),
                Action::make('mark_as_duplicate')
                    ->label(trans('ui.actions.mark_as_duplicate'))
                    ->icon(Heroicon::OutlinedDocumentDuplicate)
                    ->color('primary')
                    ->tooltip(trans('ui.actions.mark_as_duplicate_help'))
                    ->authorize('markAsDuplicate')
                    ->schema([
                        TextInput::make('id')
                            ->label(__('ID'))
                            ->uuid()
                            ->exists(Item::class, 'id')
                            ->helperText(trans('ui.actions.mark_as_duplicate_id'))
                    ])
                    ->action(function (Item $record, array $data, Action $action): void {
                        /** @var $item Item */
                        if (is_null($item = Item::find($data['id']))) {
                            $action->halt();
                        }

                        if (! dispatch_sync(new MarkAsDuplicate($record, $item))) {
                            $this->fillForm();

                            $action->cancel();
                        }

                        $action->success();
                    })
                    ->successRedirectUrl(fn(Item $record) => $record->view_url),
                Action::make('change_slug')
                    ->label(trans('ui.actions.change_slug'))
                    ->icon(Heroicon::OutlinedGlobeAlt)
                    ->color('gray')
                    ->tooltip(trans('ui.actions.change_slug_help'))
                    ->authorize('changeSlug')
                    ->schema([
                        TextInput::make('input')
                            ->maxLength(100)
                            ->label(__('Slug'))
                            ->helperText(trans('ui.actions.change_slug_new'))
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set) {
                                $set('slug', $this->record->brand->short_name . '-' . str($state)->slug());
                                $set('url',
                                    route('items.show', [
                                        'item' => $this->record->brand->short_name . '-' . str($state)->slug(),
                                    ])
                                );
                            }),

                        TextInput::make('slug')
                            ->hidden()
                            ->required()
                            ->unique(Item::class, column: 'slug'),

                        TextInput::make('url')
                            ->label(trans('ui.actions.change_slug_url'))
                            ->disabled()
                            ->helperText("https://lolibrary.org/item/{slug}"),

                    ])
                    ->action(fn(Item $record, array $data, $state) => dispatch_sync(
                        new ChangeEntrySlug($record, $this->slugify($data['input']), auth()->user()),
                    ))
                    ->successRedirectUrl(fn(Item $record) => $record->view_url),
                DeleteAction::make(),
            ]),
        ];
    }

    protected function slugify(string $input): string
    {
        return $this->record->brand->short_name . '-' . str($input)->slug();
    }
}
