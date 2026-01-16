<?php

namespace App\Filament\Pages;

use App\Models\Formulir;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class TitikLokasi extends Page
{
    protected static string |BackedEnum|null $navigationIcon  = Heroicon::OutlinedMapPin;
    protected string $view = 'filament.pages.titik-lokasi';
    protected static ?string $navigationLabel ='Titik Lokasi';
    protected static ?string $title ='Titik Lokasi Pendaftar';
    protected static ?int $navigationSort = 2;

    public function getViewData(): array
    {
        $Formulir = Formulir::whereNotNull('Latitude')
        ->whereNotNull('Longitude')
        ->get()
        ->map (function ($Formulir) {
            return [
                'first_name' => $Formulir->first_name,
                'username' => $Formulir->username,
                'handphone' => $Formulir->handphone,
                'Latitude' => $Formulir->Latitude,
                'Longitude' => $Formulir->Longitude,
            ];
        });
        return [
            'formulirs' => $Formulir,
        ];
    }
}