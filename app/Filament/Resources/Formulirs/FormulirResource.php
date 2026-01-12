<?php

namespace App\Filament\Resources\Formulirs;

use App\Filament\Resources\Formulirs\Pages\CreateFormulir;
use App\Filament\Resources\Formulirs\Pages\EditFormulir;
use App\Filament\Resources\Formulirs\Pages\ListFormulirs;
use App\Filament\Resources\Formulirs\Schemas\FormulirForm;
use App\Filament\Resources\Formulirs\Tables\FormulirsTable;
use App\Models\Formulir;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FormulirResource extends Resource
{
    protected static ?string $model = Formulir::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return FormulirForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormulirsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFormulirs::route('/'),
            'create' => CreateFormulir::route('/create'),
            'edit' => EditFormulir::route('/{record}/edit'),
        ];
    }
}
