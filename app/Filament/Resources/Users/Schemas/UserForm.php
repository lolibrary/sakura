<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\Level;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('display_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('username')
                    ->required()
                    ->rules([
                        'required',
                        'string',
                        'min:3',
                        'max:40',
                        'regex:/^[0-9a-z][0-9a-z_-]+$/u',
                        'unique:users',
                    ]),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->readOnly()
                    ->disabled(),
                Select::make('level')
                    ->options(Level::options())
                    ->required()
                    ->default(Level::Junior),
                Toggle::make('banned'),

            ]);
    }
}
