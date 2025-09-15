<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoreResource\Pages;
use App\Models\Store;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Artisan;

class StoreResource extends Resource
{
	protected static ?string $model = Store::class;
	protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')->required()->label('Store DB Name'),
				Forms\Components\Select::make('language')
					->options(['en_US' => 'English (US)', 'ar_sa' => 'Arabic'])
					->required(),
				Forms\Components\Select::make('currency')
					->options(['USD' => 'USD', 'ILS' => 'ILS', 'JOD' => 'JOD'])
					->required(),
				Forms\Components\Select::make('timezone')
					->options(['Asia/Jerusalem' => 'Asia/Jerusalem'])
					->required(),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('id'),
				Tables\Columns\TextColumn::make('name'),
				Tables\Columns\TextColumn::make('language'),
				Tables\Columns\TextColumn::make('currency'),
				Tables\Columns\TextColumn::make('timezone'),
				Tables\Columns\TextColumn::make('created_at')->dateTime(),
			])
			->actions([
				Tables\Actions\Action::make('Generate')
					->color('success')
					->icon('heroicon-o-play')
					->action(function (Store $record, array $data) {
						Artisan::call('site:generate', [
							'name' => $record->name,
							'--language' => $record->language,
							'--currency' => $record->currency,
							'--timezone' => $record->timezone,
						]);
						$this->notify('success', "Store {$record->name} generated successfully.");
					}),
			])
			->filters([]);
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListStores::route('/'),
			'create' => Pages\CreateStore::route('/create'),
			'edit' => Pages\EditStore::route('/{record}/edit'),
		];
	}
}
