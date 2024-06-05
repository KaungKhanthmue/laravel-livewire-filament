<?php

namespace App\Livewire;

use Livewire\Component;

class Category extends Component
{
    public function render()
    {
        $categories = \App\Models\Category::all();
        return view('livewire.category',[
            'categories' => $categories,
        ]);
    }
}
