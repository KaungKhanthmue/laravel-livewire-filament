<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Pages\Page;
use Illuminate\Support\Collection;
use Filament\Forms;
use Filament\Forms\Components\Split;
use Livewire\Attributes\Computed;

class Category extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.category';
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label('New User')
            ->model(\App\Models\Category::class)
            ->form([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),

            ])
        ];
    }
    public function editChartAction(): Action
    {
        return EditAction::make()
            ->iconButton()
            ->name('editChart')
            ->icon('heroicon-m-pencil-square')
            ->record(fn (array $arguments) => \App\Models\Category::find($arguments['categoryId']))
            ->form([
            Split::make([
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('slug')
                ->required()
                ->maxLength(255),
            ]),

            ]);
    }

    #[Computed()]

    public function categories()
    {
        return \App\Models\Category::get();
        
    }
    
}

