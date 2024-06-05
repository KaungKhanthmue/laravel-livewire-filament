<?php

namespace App\Filament\Pages;

use App\Models\Product;
use Filament\Actions\CreateAction;
use Filament\Pages\Page;
use Filament\Tables;
use Illuminate\Support\Collection;
use Filament\Forms;
use Livewire\Attributes\Computed;
class ProductPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.product-page';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->button()
                ->label('Add New Product')
                ->model(Product::class)
                ->form([
                    Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
                Forms\Components\Toggle::make('is_featured')
                    ->required(),
                Forms\Components\Toggle::make('in_stock')
                    ->required(),
                Forms\Components\Toggle::make('on_sale')
                    ->required(),
                ]),
        ];
    }
    #[Computed]
    public function allProducts(): Collection
    {
        return Product::get();
    }
}
