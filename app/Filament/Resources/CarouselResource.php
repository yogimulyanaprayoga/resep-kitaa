<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Carousel;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use App\Filament\Resources\CarouselResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CarouselResource\RelationManagers;

class CarouselResource extends Resource
{
    protected static ?string $model = Carousel::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Carousel';
    protected static ?string $pluralModelLabel = 'Carousels';
    protected static ?string $navigationGroup = 'Manajemen Konten';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->label('Judul')->required(),
                FileUpload::make('image_desktop')
                    ->label('Gambar Desktop')
                    ->image()
                    ->directory('carousels')
                    ->required(),

                FileUpload::make('image_mobile')
                    ->label('Gambar Mobile/Tablet')
                    ->image()
                    ->directory('carousels')
                    ->required(),
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->label('Urutan'),
                Toggle::make('is_active')->label('Aktif')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_desktop')->label('Gambar')->circular(),
                TextColumn::make('title')->searchable(),
                TextColumn::make('order'),
                BooleanColumn::make('is_active')->label('Aktif'),
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
            'index' => Pages\ListCarousels::route('/'),
            'create' => Pages\CreateCarousel::route('/create'),
            'edit' => Pages\EditCarousel::route('/{record}/edit'),
        ];
    }
}
