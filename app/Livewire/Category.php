<?php

namespace App\Livewire;

use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Livewire\Component;
use Filament\Forms;

class Category extends Component implements HasTable,HasForms
{

    use InteractsWithTable,InteractsWithForms;


}
