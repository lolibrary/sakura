<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('display_name')->inlineLabel(),
                        TextEntry::make('username')->inlineLabel(),
                        TextEntry::make('email')
                            ->label('Email address')
                            ->inlineLabel()
                            ->copyable()
                            ->icon(Heroicon::OutlinedDocumentDuplicate)
                            ->visible(fn (User $record) => auth()->user()?->can('viewEmail', $record)),
                        TextEntry::make('level')
                            ->label('Access Level')
                            ->badge()
                            ->inlineLabel(),
                        IconEntry::make('banned')->boolean()->inlineLabel(),
                        IconEntry::make('verified')->boolean()->inlineLabel(),
                    ]),
                Section::make()
                    ->contained(false)
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Created')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->label('Last Updated')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('email_verified_at')
                            ->label('Email Verified')
                            ->dateTime()
                            ->placeholder('-'),
                    ])
            ]);
    }
}
