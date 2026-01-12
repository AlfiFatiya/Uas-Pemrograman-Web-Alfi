<?php

namespace App\Filament\Resources\Formulirs\Pages;

use App\Filament\Resources\Formulirs\FormulirResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormulirs extends ListRecords
{
    protected static string $resource = FormulirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
