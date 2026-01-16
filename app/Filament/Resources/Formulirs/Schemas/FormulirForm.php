<?php

namespace App\Filament\Resources\Formulirs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class FormulirForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('username')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(),
                Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                    Select::make('provinsi')
                    ->options([
                        'Kalimantan Selatan' => 'Kalimantan Selatan',
                        'Kalimantan Timur' => 'Kalimantan Timur',
                        'Kalimantan Tengah' => 'Kalimantan Tengah',
                        'Kalimantan Barat' => 'Kalimantan Barat',
                        'Kalimantan Utara' => 'Kalimantan Utara',
                        'Jawa Barat' => 'Jawa Barat',
                        'Jawa Tengah' => 'Jawa Tengah',
                        'Jawa Timur' => 'Jawa Timur',
                        'Banten' => 'Banten',
                    ]),
                Select::make('negara')
                    ->options([
                        'Indonesia' => 'Indonesia',
                        'Malaysia' => 'Malaysia',
                        'Singapore' => 'Singapore',
                        'Korea Selatan' => 'Korea Selatan',
                        'Jepang' => 'Jepang',
                        'Thailand' => 'Thailand',
                    ]),
                TextInput::make('kode_pos')
                    ->required(),
                TextInput::make('handphone')
                    ->tel()
                    ->required(),
                TextInput::make('Latitude')
                    ->label('Latitude')
                    ->numeric()
                    ->step('any')
                    ->nullable()
                    ->helperText('Format: -6.200000')
                    ->required(),
                TextInput::make('Longitude')
                    ->label('Longitude')
                    ->numeric()
                    ->step('any')
                    ->nullable()
                    ->helperText('Format: 106.816666')
                    ->required(),
            ]);
    }
}
