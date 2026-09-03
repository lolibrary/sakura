<?php

namespace App\Filament\Components;

use Filament\Forms\Components\FileUpload as FileUploadComponent;

class MultiFileUpload
{
    public static function make(?string $name = null): FileUploadComponent
    {
        return FileUpload::make($name)
            ->previewable()
            ->imageEditor()
            ->imageEditorMode(1)
            ->multiple()
            ->reorderable()
            ->appendFiles()
            ->maxFiles(100)
            ->panelLayout('grid')
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
            ->helperText('Acceptable upload types: JPEG, PNG, GIF, WEBP. 5MB limit per file.');
    }
}
