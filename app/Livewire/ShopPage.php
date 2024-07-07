<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Shop - Epharmacy')]

class ShopPage extends Component
{
    
    use WithPagination;

    public function render()
    {
        $productQuery = Product::query()
        ->where('status', 1)
        ->with('product_measuremen.product_unit');
        return view('livewire.shop-page',[
            'products' => $productQuery->paginate(12),
        ]);
    }
}
