<?php

namespace App\Filament\Components;

use Filament\Forms\Components\FileUpload as FileUploadComponent;

class FileUpload
{
    public static function make(?string $name = null): FileUploadComponent
    {
        return FileUploadComponent::make($name)
            ->disk(config('filesystems.cloud'))
            ->visibility('public')
            ->directory('images')
            ->deletable()
            ->previewable()
            ->openable()
            ->maxSize(1024 * 5)
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
            ->helperText('Acceptable upload types: JPEG, PNG, GIF, WEBP. 5MB limit.')
            ->preventFilePathTampering();
    }
}
