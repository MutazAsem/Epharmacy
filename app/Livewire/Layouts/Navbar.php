<?php

namespace App\Livewire\Layouts;

use App\Helpers\CartManagement;
use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{

    public $totalCount = 0 ;
    public $cartItems = [];
    public $grandTotal;

    public function mount() {
        $this->totalCount = count(CartManagement::getAllCartItemsFromCookie());
        $this->cartItems = CartManagement::getAllCartItemsFromCookie();
        $this->grandTotal = CartManagement::calculateGrandTotal($this->cartItems);
    }

    #[On('update-cart-count')]
    public function updateCartCount($totalCount){
        $this->totalCount = $totalCount;
    }

    #[On('update-cart-total')]
    public function updateGrandTotal($grandTotal){
        $this->grandTotal = $grandTotal;
    }

    public function render()
    {
        return view('livewire.layouts.navbar');
    }
}
