<?php

namespace App\Filament\Components\Table;

use Filament\Tables\Columns\ImageColumn as ImageColumnComponent;

class ImageColumn
{
    public static function make(string $name): ImageColumnComponent
    {
        return ImageColumnComponent::make('image')
            ->disk('s3public')
            ->visibility('public')
            ->square()
            ->checkFileExistence(false);
    }
}
