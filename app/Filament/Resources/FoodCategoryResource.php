<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\FoodCategory;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FoodCategoryResource\Pages;
use App\Filament\Resources\FoodCategoryResource\RelationManagers;

class FoodCategoryResource extends Resource
{
    protected static ?string $model = FoodCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Manajemen Resep';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Kategori')
                    ->required()
                    ->live(debounce: 500)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->unique(FoodCategory::class, 'slug', ignoreRecord: true),

                FileUpload::make('image')
                    ->label('Gambar Kategori')
                    ->image()
                    ->directory('food-categories')
                    ->nullable(),

                FileUpload::make('icon')
                    ->label('Icon Kategori')
                    ->image()
                    ->directory('food-category-icons')
                    ->maxSize(512)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama'),
                ImageColumn::make('image')->label('Gambar')->rounded(),
                TextColumn::make('slug')->label('Slug')->toggleable(),
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
            'index' => Pages\ListFoodCategories::route('/'),
            'create' => Pages\CreateFoodCategory::route('/create'),
            'edit' => Pages\EditFoodCategory::route('/{record}/edit'),
        ];
    }
}
