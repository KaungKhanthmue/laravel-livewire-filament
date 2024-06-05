<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;


class ProductDetailPage extends Component
{
    #[Title('Product Detail')]
    public $id;
    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $product = Product::find($this->id);
        return view('livewire.product-detail-page',[
            'product'=> $product
        ]);
    }
}
