<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image_id')
                    ->image(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('username')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('level')
                    ->required()
                    ->numeric()
                    ->default(10),
                Toggle::make('banned')
                    ->required(),
                DateTimePicker::make('verified_at'),
                TextInput::make('password')
                    ->password(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('public_wishlist')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('public_closet')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
