<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Actions\CreateAction;
use Filament\Pages\Page;
use Filament\Forms;
use Livewire\Attributes\Computed;

class UserPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.user-page';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label('New User')
            ->model(User::class)
            ->form([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('cover_url')
                    ->disk('public')
                    ->directory('user-coverimage')
                    ->visibility('public'),
                Forms\Components\FileUpload::make('profile_url')
                    ->disk('public')
                    ->directory('user-coverimage')
                    ->visibility('public')

            ])
        ];
    }
    #[Computed]
    public function allUsers()
    {
        return User::get();
    }
}
