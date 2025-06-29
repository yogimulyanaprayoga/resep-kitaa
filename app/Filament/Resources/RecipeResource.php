<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Recipe;
use Filament\Forms\Form;
use App\Models\Ingredient;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\RecipeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RecipeResource\RelationManagers;

class RecipeResource extends Resource
{
    protected static ?string $model = Recipe::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Manajemen Resep';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Nama Makanan')
                    ->required()
                    ->live(debounce: 500)
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('slug', Str::slug($state));
                    }),

                TextInput::make('slug')
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->unique(Recipe::class, 'slug', ignoreRecord: true),

                FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->directory('recipes')
                    ->nullable(),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->nullable(),

                Select::make('main_ingredient_id')
                    ->label('Bahan Utama')
                    ->options(Ingredient::all()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('food_category_id')
                    ->label('Kategori Makanan')
                    ->options(\App\Models\FoodCategory::all()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),

                Grid::make(2)->schema([
                    TextInput::make('cook_minutes')
                        ->label('Waktu Memasak (menit)')
                        ->numeric()
                        ->minValue(1)
                        ->nullable(),

                    TextInput::make('servings')
                        ->label('Jumlah Porsi')
                        ->numeric()
                        ->minValue(1)
                        ->nullable(),
                ]),

                Grid::make(3)->schema([
                    TextInput::make('calories')
                        ->label('Kalori (kkal)')
                        ->numeric()
                        ->nullable(),

                    TextInput::make('protein')
                        ->label('Protein (g)')
                        ->numeric()
                        ->nullable(),

                    TextInput::make('carbohydrate')
                        ->label('Karbohidrat (g)')
                        ->numeric()
                        ->nullable(),

                    TextInput::make('fat')
                        ->label('Lemak (g)')
                        ->numeric()
                        ->nullable(),

                    TextInput::make('fiber')
                        ->label('Serat (g)')
                        ->numeric()
                        ->nullable(),
                ]),

                RichEditor::make('instructions')
                    ->label('Langkah-langkah Memasak')
                    ->required(),

                RichEditor::make('ingredients')
                    ->label('Bahan-bahan')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'bulletList',
                        'orderedList',
                        'undo',
                        'redo',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Gambar')->circular(),
                TextColumn::make('title')->searchable(),
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
            'index' => Pages\ListRecipes::route('/'),
            'create' => Pages\CreateRecipe::route('/create'),
            'edit' => Pages\EditRecipe::route('/{record}/edit'),
        ];
    }
}
