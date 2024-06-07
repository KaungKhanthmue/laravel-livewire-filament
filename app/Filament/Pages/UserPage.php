<?php
namespace App\Filament\Pages;

use App\Models\User;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
use Filament\Support\Enums\ActionSize;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class UserPage extends Page
{
    use WithPagination;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'User';
    protected static string $view = 'filament.pages.user-page';

    public $showSwitch = false;

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
    public function editAction()
    {
        return EditAction::make()
        ->name('edit')
        ->button()
        ->outlined()    
        ->model(User::class)
        ->record(fn (array $arguments) => \App\Models\User::find($arguments['userId']))
        ->label('edit')
        ->form([
            Forms\Components\TextInput::make('name')
            ->required()
            ->maxLength(255),
        Forms\Components\TextInput::make('email')
            ->email()
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
        ]);

    }
    public function viewAction()
    {
        return ViewAction::make()
        ->name('view')
        ->button()
        ->outlined()
        ->model(User::class)
        ->record(fn (array $arguments) => \App\Models\User::find($arguments['userId']))
        ->label('view')
        ->infolist([
            TextEntry::make('name'),
        ]);
    }
    public function deleteAction()
    {
        return DeleteAction::make()
        ->name('delete')
        ->model(User::class)
        ->label('delete')
        ->button()
        ->outlined()
        ->size(ActionSize::Small)
        ->record(fn(array $arguments)=> \App\Models\User::find($arguments['userId']))
        ->successNotification(
            Notification::make()
                 ->success()
                 ->title('User deleted')
                 ->body('The user has been deleted successfully.'),
         );
    }

    #[Computed()]

    public function users()
    {
        return \App\Models\User::query()->paginate(12);
    
}
}