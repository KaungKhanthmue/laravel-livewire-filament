<?php

namespace App\Livewire;

use Filament\Actions\CreateAction;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Livewire\Component;
use Filament\Forms;

class Category extends Component implements HasForms
{
    use InteractsWithForms;
    public function render()
    {
        $categories = \App\Models\Category::all();
        return view('livewire.category',[
            'categories' => $categories,
        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label('New User')
            ->model(\App\Models\Category::class)
            ->form([
            Forms\Components\TextInput::make('name')
                ->required()
                ->live()
                ->maxLength(255),
            Forms\Components\TextInput::make('slug')
                ->required()
                ->maxLength(255),
            Forms\Components\FileUpload::make('image_url')
                ->disk('public')
                ->directory('category')
                ->visibility('public')
                ->image(),
            Forms\Components\Toggle::make('is_active')
                ->required(),
                
            ])
        ];
    }
}
