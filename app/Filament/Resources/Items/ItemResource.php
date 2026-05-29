<?php

namespace App\Filament\Resources\Items;

use App\Filament\Resources\Items\Pages\ManageItems;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Feature;
use App\Models\Item;
use App\Models\Tag;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use UnitEnum;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Library';

    protected static ?string $navigationLabel = 'Items';

    protected static ?string $recordTitleAttribute = 'english_name';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Core Details')
                ->schema([
                    Placeholder::make('status_summary')
                        ->label('Status')
                        ->content(fn (?Item $record): string => $record ? static::getStatusLabel($record->status) : 'Draft'),
                    Placeholder::make('public_url')
                        ->label('Public Page')
                        ->content(function (?Item $record): string | HtmlString {
                            if (! $record?->slug) {
                                return 'Available after the item is created.';
                            }

                            $url = e($record->url);

                            return new HtmlString("<a href=\"{$url}\" target=\"_blank\" rel=\"noopener\">Open item page</a>");
                        }),
                    Placeholder::make('slug_preview')
                        ->label('Slug')
                        ->content(function (?Item $record): string | HtmlString {
                            if (! $record?->slug) {
                                return 'Generated when the item is created.';
                            }

                            $url = e($record->url);
                            $slug = e($record->slug);

                            return new HtmlString("<a href=\"{$url}\" target=\"_blank\" rel=\"noopener\">{$slug}</a>");
                        }),
                    TextInput::make('english_name')
                        ->required()
                        ->maxLength(300),
                    TextInput::make('foreign_name')
                        ->maxLength(300),
                    TextInput::make('product_number')
                        ->maxLength(255),
                    Select::make('year')
                        ->options(static::getYearOptions())
                        ->searchable()
                        ->native(false),
                    Select::make('brand_id')
                        ->label('Brand')
                        ->options(static::getBrandOptions())
                        ->required()
                        ->searchable()
                        ->native(false)
                        ->disabled(fn (?Item $record): bool => (bool) $record?->published())
                        ->helperText(fn (?Item $record): ?string => $record?->published() ? 'Brand stays locked once an item is published.' : null),
                    Select::make('category_ids')
                        ->label('Categories')
                        ->options(static::getCategoryOptions())
                        ->multiple()
                        ->required()
                        ->minItems(1)
                        ->searchable()
                        ->native(false)
                        ->disabled(fn (?Item $record): bool => (bool) $record?->published())
                        ->helperText(fn (?Item $record): ?string => $record?->published() ? 'Categories stay locked once an item is published.' : null),
                ])->columns(2),
            Section::make('Pricing')
                ->schema([
                    Select::make('currency')
                        ->options(Item::CURRENCIES)
                        ->searchable()
                        ->native(false),
                    TextInput::make('price')
                        ->numeric()
                        ->inputMode('decimal')
                        ->helperText('Values should only be numbers - no commas or currency symbols.'),
                ])->columns(2),
            Section::make('Images')
                ->schema([
                    Placeholder::make('main_image_preview')
                        ->label('Current Main Image')
                        ->content(function (?Item $record): string | HtmlString {
                            if (! $record?->image) {
                                return 'No main image saved.';
                            }

                            $url = e(cdn_link($record->image));

                            return new HtmlString("<a href=\"{$url}\" target=\"_blank\" rel=\"noopener\"><img src=\"{$url}\" alt=\"Main item image\" style=\"max-height: 8rem; border-radius: 0.5rem;\"></a>");
                        }),
                    TextInput::make('image')
                        ->label('Main Image Path')
                        ->maxLength(255)
                        ->helperText('Temporary bridge until direct uploads are rebuilt in Filament.'),
                    Repeater::make('images')
                        ->label('Additional Images')
                        ->schema([
                            Hidden::make('key')
                                ->default(fn (): string => Str::random(16)),
                            Hidden::make('layout')
                                ->default('image'),
                            TextInput::make('attributes.image')
                                ->label('Image Path')
                                ->required()
                                ->maxLength(255),
                        ])
                        ->default([])
                        ->columns(1)
                        ->columnSpanFull()
                        ->helperText('These rows store the legacy Flexible-style image payload used by the current item renderer.')
                        ->itemLabel(fn (array $state): ?string => data_get($state, 'attributes.image')),
                ]),
            Section::make('Relationships')
                ->schema([
                    Select::make('feature_ids')
                        ->label('Features')
                        ->options(static::getFeatureOptions())
                        ->multiple()
                        ->searchable()
                        ->native(false),
                    Select::make('color_ids')
                        ->label('Colors')
                        ->options(static::getColorOptions())
                        ->multiple()
                        ->searchable()
                        ->native(false),
                    Select::make('tag_ids')
                        ->label('Tags')
                        ->options(static::getTagOptions())
                        ->multiple()
                        ->searchable()
                        ->native(false),
                ])->columns(1),
            Section::make('Attributes')
                ->schema([
                    Repeater::make('attribute_values')
                        ->label('Attribute Values')
                        ->schema([
                            Select::make('attribute_id')
                                ->label('Attribute')
                                ->options(static::getAttributeOptions())
                                ->required()
                                ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                ->searchable()
                                ->native(false),
                            TextInput::make('value')
                                ->label('Value')
                                ->maxLength(255),
                        ])
                        ->default([])
                        ->columns(2)
                        ->columnSpanFull()
                        ->itemLabel(function (array $state): ?string {
                            $attributeId = $state['attribute_id'] ?? null;

                            if ($attributeId === null) {
                                return null;
                            }

                            return static::getAttributeOptions()[$attributeId] ?? null;
                        }),
                ]),
            Section::make('Notes')
                ->schema([
                    RichEditor::make('notes')
                        ->toolbarButtons([
                            'bold',
                            'italic',
                            'bulletList',
                            'orderedList',
                            'link',
                            'undo',
                            'redo',
                        ]),
                    RichEditor::make('internal_notes')
                        ->label('Internal Notes & Sources')
                        ->helperText('Please provide sources and credit images that are not yours.')
                        ->toolbarButtons([
                            'bold',
                            'italic',
                            'bulletList',
                            'orderedList',
                            'link',
                            'undo',
                            'redo',
                        ]),
                ]),
            Section::make('Submission Details')
                ->schema([
                    Placeholder::make('submitter_name')
                        ->label('Submitter')
                        ->content(fn (?Item $record): string => $record?->submitter?->name ?? 'Assigned automatically on create'),
                    Placeholder::make('publisher_name')
                        ->label('Publisher')
                        ->content(fn (?Item $record): string => $record?->publisher?->name ?? 'Not published yet'),
                    Placeholder::make('created_at')
                        ->label('Created')
                        ->content(fn (?Item $record): string => $record?->created_at?->toDayDateTimeString() ?? 'Pending'),
                    Placeholder::make('updated_at')
                        ->label('Updated')
                        ->content(fn (?Item $record): string => $record?->updated_at?->toDayDateTimeString() ?? 'Pending'),
                    Placeholder::make('published_at')
                        ->label('Published')
                        ->content(fn (?Item $record): string => $record?->published_at?->toDayDateTimeString() ?? 'Not published'),
                ])->columns(2)
                ->visible(fn (?Item $record): bool => $record !== null),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('english_name')
            ->modifyQueryUsing(fn (Builder $query) => $query->with(['submitter', 'brand', 'categories', 'publisher']))
            ->columns([
                ImageColumn::make('image_preview')
                    ->label('Image')
                    ->square()
                    ->state(fn (Item $record): ?string => $record->image ? cdn_link($record->image) : null),
                TextColumn::make('english_name')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where(function (Builder $query) use ($search) {
                            $like = "%{$search}%";

                            $query->where('english_name', 'like', $like)
                                ->orWhere('foreign_name', 'like', $like)
                                ->orWhere('product_number', 'like', $like)
                                ->orWhere('slug', 'like', $like);
                        });
                    })
                    ->sortable()
                    ->limit(40),
                TextColumn::make('brand.name')
                    ->label('Brand')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('categories.name')
                    ->label('Categories')
                    ->badge()
                    ->separator(', '),
                TextColumn::make('status')
                    ->formatStateUsing(fn (int $state): string => static::getStatusLabel($state))
                    ->badge()
                    ->color(fn (int $state): string => static::getStatusColor($state)),
                TextColumn::make('year')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('submitter.name')
                    ->label('Submitter')
                    ->toggleable(),
                TextColumn::make('publisher.name')
                    ->label('Publisher')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('slug')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->date()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('status_scope')
                    ->label('Status Scope')
                    ->options(fn (): array => static::getStatusFilterOptions())
                    ->query(fn (Builder $query, array $data): Builder => static::applyStatusFilter($query, $data['value'] ?? null)),
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('view_public')
                    ->label('View')
                    ->icon(Heroicon::OutlinedEye)
                    ->url(fn (Item $record): string => $record->url)
                    ->openUrlInNewTab(),
                static::makePublishAction(),
                static::makeUnpublishAction(),
                static::makePendingAction(),
                static::makeDraftAction(),
                static::makeChangesRequestedAction(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageItems::route('/'),
        ];
    }

    public static function getYearOptions(): array
    {
        return collect(range(1970, (int) date('Y') + 3))
            ->reverse()
            ->mapWithKeys(fn (int $year): array => [$year => (string) $year])
            ->all();
    }

    public static function getBrandOptions(): array
    {
        return Brand::query()->orderByTranslation('name')->get()
            ->mapWithKeys(fn (Brand $brand): array => [$brand->id => $brand->name])
            ->all();
    }

    public static function getCategoryOptions(): array
    {
        return Category::query()->orderByTranslation('name')->get()
            ->mapWithKeys(fn (Category $category): array => [$category->id => $category->name])
            ->all();
    }

    public static function getFeatureOptions(): array
    {
        return Feature::query()->orderByTranslation('name')->get()
            ->mapWithKeys(fn (Feature $feature): array => [$feature->id => $feature->name])
            ->all();
    }

    public static function getColorOptions(): array
    {
        return Color::query()->orderByTranslation('name')->get()
            ->mapWithKeys(fn (Color $color): array => [$color->id => $color->name])
            ->all();
    }

    public static function getTagOptions(): array
    {
        return Tag::query()->orderBy('slug')->get()
            ->mapWithKeys(fn (Tag $tag): array => [$tag->id => $tag->slug])
            ->all();
    }

    public static function getAttributeOptions(): array
    {
        return Attribute::query()->orderByTranslation('name')->get()
            ->mapWithKeys(fn (Attribute $attribute): array => [$attribute->id => $attribute->name])
            ->all();
    }

    public static function getStatusLabel(int $status): string
    {
        return match ($status) {
            Item::PUBLISHED => 'Published',
            Item::DRAFT => 'Draft',
            Item::PENDING => 'Pending',
            Item::CHANGES_REQUESTED => 'Changes Requested',
            Item::MISSING_IMAGES => 'Missing Images',
            Item::SHOE_DRAFTS => 'Shoe Drafts',
            default => 'Unknown',
        };
    }

    public static function getStatusColor(int $status): string
    {
        return match ($status) {
            Item::PUBLISHED => 'success',
            Item::DRAFT, Item::CHANGES_REQUESTED => 'danger',
            Item::PENDING => 'info',
            Item::MISSING_IMAGES, Item::SHOE_DRAFTS => 'warning',
            default => 'gray',
        };
    }

    public static function getStatusFilterOptions(): array
    {
        $user = auth()->user();

        if ($user?->developer()) {
            return [
                'My Items' => 'my-items',
                'My Drafts' => 'my-drafts',
                'My Items (Changes Requested)' => 'my-changes-requested-items',
                'Published by Me' => 'published-by-me',
                'My Items (Published by Others)' => 'published-by-others',
                'Show Drafts (status = 10)' => 'shoe-drafts',
                'Missing Images (status = 4)' => 'missing-images',
                'Pending Review (status = 2)' => 'pending-items',
                'All Published (status = 1)' => 'published',
                'All Drafts (status = 0)' => 'drafts',
                'All Requested Changes' => 'changes-requested',
            ];
        }

        if ($user?->senior()) {
            return [
                'My Items' => 'my-items',
                'My Drafts' => 'my-drafts',
                'My Items (Changes Requested)' => 'my-changes-requested-items',
                'Published by Me' => 'published-by-me',
                'My Items (Published by Others)' => 'published-by-others',
                'All Drafts' => 'drafts',
                'All Published' => 'published',
                'All Requested Changes' => 'changes-requested',
                'Pending Review' => 'pending',
            ];
        }

        return [
            'My Items' => 'my-items',
            'My Drafts' => 'my-drafts',
            'My Items (Changes Requested)' => 'my-changes-requested-items',
            'My Items (Pending)' => 'my-pending-items',
            'My Items (Published)' => 'my-published',
            'All Drafts' => 'drafts',
            'All Published' => 'published',
            'All Requested Changes' => 'changes-requested',
            'All Pending' => 'pending',
        ];
    }

    public static function applyStatusFilter(Builder $query, ?string $value): Builder
    {
        $user = auth()->user();

        if ($value === null || $user === null) {
            return $query;
        }

        if ($user->developer()) {
            return match ($value) {
                'shoe-drafts' => $query->where('status', Item::SHOE_DRAFTS),
                'pending-items' => $query->where('status', Item::PENDING),
                'missing-images' => $query->where('status', Item::MISSING_IMAGES),
                default => static::applyStandardStatusFilter($query, $value, $user->id),
            };
        }

        return static::applyStandardStatusFilter($query, $value, $user->id);
    }

    protected static function applyStandardStatusFilter(Builder $query, string $value, string $userId): Builder
    {
        return match ($value) {
            'published' => $query->where('status', Item::PUBLISHED),
            'my-published' => $query->where('user_id', $userId)->where('status', Item::PUBLISHED),
            'pending' => $query->where('status', Item::PENDING),
            'changes-requested' => $query->where('status', Item::CHANGES_REQUESTED),
            'drafts' => $query->where('status', Item::DRAFT),
            'my-drafts' => $query->where('user_id', $userId)->where('status', Item::DRAFT),
            'my-items' => $query->where('user_id', $userId),
            'my-pending-items' => $query->where('user_id', $userId)->where('status', Item::PENDING),
            'my-changes-requested-items' => $query->where('user_id', $userId)->where('status', Item::CHANGES_REQUESTED),
            'published-by-me' => $query->where('publisher_id', $userId)->where('status', Item::PUBLISHED),
            'published-by-others' => $query->where('user_id', $userId)->where('publisher_id', '!=', $userId)->where('status', Item::PUBLISHED),
            default => $query,
        };
    }

    protected static function makePublishAction(): Action
    {
        return Action::make('publish')
            ->label('Publish')
            ->color('success')
            ->requiresConfirmation()
            ->visible(fn (Item $record): bool => ! $record->published() && auth()->user()?->can('publish', $record))
            ->successNotificationTitle('Item published')
            ->action(function (Item $record): void {
                $record->publish(auth()->user());
            });
    }

    protected static function makeUnpublishAction(): Action
    {
        return Action::make('unpublish')
            ->label('Unpublish')
            ->color('warning')
            ->requiresConfirmation()
            ->visible(fn (Item $record): bool => ! $record->draft() && auth()->user()?->can('publish', $record))
            ->successNotificationTitle('Item moved back to draft')
            ->action(function (Item $record): void {
                $record->unpublish();
            });
    }

    protected static function makePendingAction(): Action
    {
        return Action::make('mark_pending')
            ->label('Mark Pending')
            ->color('info')
            ->requiresConfirmation()
            ->visible(fn (Item $record): bool => ! $record->published() && auth()->user()?->can('update', $record))
            ->successNotificationTitle('Item marked pending')
            ->action(function (Item $record): void {
                $record->setPending();
            });
    }

    protected static function makeDraftAction(): Action
    {
        return Action::make('mark_draft')
            ->label('Mark Draft')
            ->color('gray')
            ->requiresConfirmation()
            ->visible(function (Item $record): bool {
                $user = auth()->user();

                if ($record->published()) {
                    return (bool) $user?->can('publish', $record);
                }

                return (bool) $user?->can('update', $record);
            })
            ->successNotificationTitle('Item marked draft')
            ->action(function (Item $record): void {
                $record->unpublish();
            });
    }

    protected static function makeChangesRequestedAction(): Action
    {
        return Action::make('request_changes')
            ->label('Request Changes')
            ->color('danger')
            ->requiresConfirmation()
            ->visible(function (Item $record): bool {
                $user = auth()->user();

                if ($record->published()) {
                    return (bool) $user?->can('publish', $record);
                }

                return (bool) $user?->can('update', $record);
            })
            ->successNotificationTitle('Item marked as changes requested')
            ->action(function (Item $record): void {
                $record->setChangesRequested();
            });
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('viewAny', Item::class) ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create', Item::class) ?? false;
    }
}
