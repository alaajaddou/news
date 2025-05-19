<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppTokenResource\Pages;
use App\Filament\Resources\AppTokenResource\RelationManagers;
use App\Models\AppToken;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppTokenResource extends Resource
{
    protected static ?string $model = AppToken::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('app_id')
                    ->required()
                    ->maxLength(64),
                Forms\Components\TextInput::make('app_secret')
                    ->required()
                    ->maxLength(128),
                Forms\Components\TextInput::make('app_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255)
                    ->default('active'),
                Forms\Components\DateTimePicker::make('last_used_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('app_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('app_secret')
                    ->searchable(),
                Tables\Columns\TextColumn::make('app_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_used_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAppTokens::route('/'),
            'create' => Pages\CreateAppToken::route('/create'),
            'edit' => Pages\EditAppToken::route('/{record}/edit'),
        ];
    }
}
