<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Layouts\Navbar;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Cart - Epharmacy')]

class CartPage extends Component
{
    use LivewireAlert;

    public $cartItems = [];
    public $grandTotal;
    public $productUnitId;



    public function mount(){
        $this->cartItems = CartManagement::getAllCartItemsFromCookie();
        $this->grandTotal = CartManagement::calculateGrandTotal($this->cartItems);
        

        // dd( $this->cartItems = CartManagement::getAllCartItemsFromCookie());
    }

    public function removeItem($productId ,$productUnitId){
        $this->cartItems = CartManagement::removeItemFromCart($productId ,$productUnitId);
        $this->grandTotal = CartManagement::calculateGrandTotal($this->cartItems);
        $this->dispatch('update-cart-count' , totalCount: count($this->cartItems))->to(Navbar::class);
        $this->dispatch('update-cart-total' , grandTotal: $this->grandTotal)->to(Navbar::class);
        $this->alert('error', 'Item has been removed', [
            'position' => 'center',
            'timer' => '1600',
            'toast' => true,
           ]);
    }

    public function incrementQty($productId ,$productUnitId){
        $this->cartItems = CartManagement::incrementQuantityToCartItem($productId , $productUnitId);
        $this->grandTotal = CartManagement::calculateGrandTotal($this->cartItems);
    }

    public function decrementQty($productId ,$productUnitId){
        $this->cartItems = CartManagement::decrementQuantityToCartItem($productId , $productUnitId);
        $this->grandTotal = CartManagement::calculateGrandTotal($this->cartItems);
    }

    public function clearCart(){
        $this->cartItems = CartManagement::clearCartItemsFromCookie();
    }
    
    public function render()
    {
        return view('livewire.cart-page');
    }
}
