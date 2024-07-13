<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Product Details - Epharmacy')]

class ProductDetailsPage extends Component
{
    public $id;

    public function mount($id){
        $this->id = $id;
    }

    public function render()
    {
        
        $product = Product::where('id',$this->id)->with('product_category')->firstOrFail();
        $productPrice = Product::where('id',$this->id)->with('product_measuremen.product_unit')->firstOrFail();
        $productAlternativ = $product->alternativ_product()->get();


        return view('livewire.product-details-page',[
            'product' => $product,
            'productPrice' => $productPrice,
            'productAlternativ' => $productAlternativ,

        ]);
    }
}
