<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Shop - Epharmacy')]

class ShopPage extends Component
{
    
    use WithPagination;

    #[Url]

    public $selectedCategories = [];

    // #[Url]
    // public $priceRange = 1000;

    public function render()
    {   
        $categories = Category::where('status',1)->get(['id','name']);

        $productQuery = Product::query()
        ->where('status', 1)
        ->with('product_measuremen.product_unit');

        if(!empty($this->selectedCategories)){
            $productQuery->whereIn('category_id',$this->selectedCategories);
        }

        return view('livewire.shop-page',[
            'products' => $productQuery->paginate(12),
            'categories' => $categories,
        ]);
    }
}
