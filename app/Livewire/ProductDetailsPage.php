<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Layouts\Navbar;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Product Details - Epharmacy')]

class ProductDetailsPage extends Component
{

    use LivewireAlert;

    public $id;
    public $quantity = 1;
    public $productUnitId;
    public $selectedPrice;
    public $selectedUnitName;
    public $cartItems = [];
    public $grandTotal;

    public function incrementQty(){
        $this->quantity++;
    }

    public function decrementQty(){
        if($this->quantity > 1){
            $this->quantity--;
        }
        
    }

    public function updateProductUnit($id, $name)
{
    $this->productUnitId = $id;
    $this->selectedUnitName = $name;
}
        // Add item to Cart
        public function addToCart ($productId){
            $this->cartItems = CartManagement::addItemToCartWithQty(
                $productId , $this->quantity , $this->productUnitId, $this->selectedUnitName ,$this->selectedPrice);
    

            $this->grandTotal = CartManagement::calculateGrandTotal($this->cartItems);
    
            $this->dispatch('update-cart-total', grandTotal: $this->grandTotal)->to(Navbar::class);
            $this->dispatch('update-cart-count' , totalCount: count($this->cartItems))->to(Navbar::class);
    
            $this->alert('success', 'Product added to the cart successfully', [
                'position' => 'bottom-end',
                'timer' => 1600,
                'toast' => true,
               ]);
               
        }

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
