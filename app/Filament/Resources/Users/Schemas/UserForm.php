<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\Level;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('username')
                    ->required()
                    ->rules([
                        'required',
                        Rule::string()
                            ->min(3)
                            ->max(40)
                            ->alphaDash()
                            ->lowercase()
                            ->doesntStartWith('-', '_')
                            ->doesntEndWith('-', '_'),
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
