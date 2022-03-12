<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CardioResource\Pages;
use App\Filament\Resources\CardioResource\RelationManagers;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use App\Models\Cardio;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CardioResource extends Resource
{
    protected static ?string $model = Cardio::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    protected static ?string $navigationLabel = 'Cardio';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->options([
                        'treadmill' => 'Treadmill',
                        'outdoor_run' => 'Outdoor Run',
                        'biking' => 'Biking',
                    ]),
                TextInput::make('duration')
                    ->numeric()
                    ->mask(fn (TextInput\Mask $mask) => $mask
                        ->numeric()
                        ->decimalPlaces(2)
                        ->decimalSeparator('.')
                    ),
                TextInput::make('distance')
                    ->numeric()
                    ->mask(fn (TextInput\Mask $mask) => $mask
                        ->numeric()
                        ->decimalPlaces(2)
                        ->decimalSeparator('.')
                    ),
                DatePicker::make('date')
                    ->format('m/d/Y')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')->date('F d, Y'),
                Tables\Columns\TextColumn::make('type')->enum([
                    'treadmill' => 'Treadmill',
                    'outdoor_run' => 'Outdoor Run',
                    'biking' => 'Biking'
                ]),
                Tables\Columns\TextColumn::make('duration'),
                Tables\Columns\TextColumn::make('distance'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListCardios::route('/'),
            'create' => Pages\CreateCardio::route('/create'),
            'edit' => Pages\EditCardio::route('/{record}/edit'),
        ];
    }
}
