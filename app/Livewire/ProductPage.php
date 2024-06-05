<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProductPage extends Component
{
    use WithPagination;
    #[Title('Product Page')]
    #[Url]
    public $categoryId= [];
    public $brandId =[];

    public function render()
    {
        $products = Product::paginate(2);
        if(!empty($this->categoryId))
        {
            $products->whereIn('category_id', $this->categoryId);
        }
        $brands = Brand::get(['id','name']);
        if(!empty($this->brandId)){
            $products->whereIn('brand_id', $this->brandId);
        }

        return view('livewire.product-page',[
            'products' => $products,
            'categories' => Category::get(['id','name']),
            'brands'  => $brands,
        ]);
    }
}
