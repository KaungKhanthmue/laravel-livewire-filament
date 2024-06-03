<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

class HomePage extends Component
{

    #[Title('Home Page')]
    public function render()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('livewire.home-page',[
            'brands' => $brands,
            'categories' => $categories
        ]);
    }
}
