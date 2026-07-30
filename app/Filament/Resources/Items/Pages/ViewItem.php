<?php

namespace App\Filament\Resources\Items\Pages;

use App\Filament\Resources\Items\ItemResource;
use App\Jobs\MarkAsDraft;
use App\Jobs\PublishItem;
use App\Jobs\ReadyForReview;
use App\Jobs\RequestChanges;
use App\Jobs\UnpublishItem;
use App\Models\Attribute;
use App\Models\Item;
use Filament\Actions\Action;
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
            ReplicateAction::make()
                ->icon(Heroicon::OutlinedClipboardDocument)
                ->color('gray')
                ->schema([
                    TextInput::make('english_name')
                        ->maxLength(255)
                        ->required()
                ])
                ->excludeAttributes([
                    'image',
                    'images',
                    'slug',
                    'publisher_id',
                    'submitter_id',
                    'published_at',
                    'status',
                    'created_at',
                    'updated_at',
                ])
                ->mutateRecordDataUsing(function (array $data): array {
                    $data['user_id'] = auth()->id();

                    return $data;
                })
                ->after(function (Item $record, Item $replica): void {
                    DB::transaction(function () use ($record, $replica) {
                        $replica->categories()->sync($record->categories);
                        $replica->features()->sync($record->features);
                        $replica->colors()->sync($record->colors);
                        $replica->tags()->sync($record->tags);
                        $replica->attributes()->sync(
                            $record->attributes
                                ->mapWithKeys(fn(Attribute $attr) => [
                                    $attr->id => [
                                        'value' => $attr->value,
                                    ],
                                ])
                        );
                    });


                })
                ->successRedirectUrl(fn(Item $replica) => $replica->view_url),
            Action::make('publish')
                ->requiresConfirmation()
                ->icon(Heroicon::OutlinedCheckBadge)
                ->color('success')
                ->authorize('publish')
                ->action(fn() => dispatch(new PublishItem($this->record, auth()->user())) && $this->fillForm()),
            Action::make('unpublish')
                ->requiresConfirmation()
                ->icon(Heroicon::OutlinedArchiveBoxXMark)
                ->color('danger')
                ->authorize('unpublish')
                ->action(fn() => dispatch(new UnpublishItem($this->record, auth()->user())) && $this->fillForm()),
            Action::make('ready_for_review')
                ->icon(Heroicon::OutlinedClipboardDocumentCheck)
                ->color('info')
                ->authorize('readyForReview')
                ->action(fn() => dispatch(new ReadyForReview($this->record, auth()->user())) && $this->fillForm()),
            Action::make('mark_as_draft')
                ->icon(Heroicon::OutlinedDocument)
                ->color('gray')
                ->authorize('markAsDraft')
                ->action(fn() => dispatch(new MarkAsDraft($this->record, auth()->user())) && $this->fillForm()),
            Action::make('request_changes')
                ->icon(Heroicon::OutlinedChatBubbleLeftEllipsis)
                ->color('warning')
                ->authorize('requestChanges')
                ->action(fn() => dispatch(new RequestChanges($this->record, auth()->user())) && $this->fillForm()),
        ];
    }
}
