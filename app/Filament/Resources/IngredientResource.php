<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Ingredient;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\IngredientResource\Pages;
use App\Filament\Resources\IngredientResource\RelationManagers;

class IngredientResource extends Resource
{
    protected static ?string $model = Ingredient::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Manajemen Resep';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Bahan')
                    ->required()
                    ->maxLength(100),

                TextInput::make('type')
                    ->label('Tipe (opsional)')
                    ->placeholder('misal: protein, sayur, bumbu')
                    ->maxLength(100)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Bahan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label('Tipe')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListIngredients::route('/'),
            'create' => Pages\CreateIngredient::route('/create'),
            'edit' => Pages\EditIngredient::route('/{record}/edit'),
        ];
    }
}
