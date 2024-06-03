<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class ProductPage extends Component
{

    #[Title('Product Page')]
    public function render()
    {
        return view('livewire.product-page');
    }
}
