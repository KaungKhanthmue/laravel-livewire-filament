<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class CategoryPage extends Component
{
    #[Title("Category Page")]
    public function render()
    {
        return view('livewire.category-page');
    }
}
