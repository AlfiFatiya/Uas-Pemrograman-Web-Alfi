<?php

namespace App\Filament\Resources\Formulirs\Pages;

use App\Filament\Resources\Formulirs\FormulirResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFormulir extends CreateRecord
{
    protected static string $resource = FormulirResource::class;

    public function getTitle(): string
    {
        return 'Form Sign  Up Horizontal';
    }
}
