<?php

namespace App\Filament\Resources\Formulirs\Pages;

use App\Filament\Resources\Formulirs\FormulirResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFormulir extends EditRecord
{
    protected static string $resource = FormulirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
