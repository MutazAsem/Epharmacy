<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Layouts\Navbar;
use App\Models\Article;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Home - Epharmacy')]

class HomePage extends Component
{

    // use LivewireAlert;



    public $selectedCategories = [];
    public $productUnitId;
    // public $cartItems = [];
    // public $grandTotal;



    // // Add item to Cart
    // public function addToCart($productId, $productUnitId)
    // {
    //     $this->cartItems = CartManagement::addItemToCart($productId, $productUnitId);
    //     $this->grandTotal = CartManagement::calculateGrandTotal($this->cartItems);

    //     $this->dispatch('update-cart-total', grandTotal: $this->grandTotal)->to(Navbar::class);
    //     $this->dispatch('update-cart-count' , totalCount: count($this->cartItems))->to(Navbar::class);

    //     $this->alert('success', 'Product added to the cart successfully', [
    //         'position' => 'bottom-end',
    //         'timer' => 1600,
    //         'toast' => true,
    //     ]);
    // }
    
    public function render()
    {

        $productQuery = Product::query()
        ->where('status', 1)
        ->with('product_measuremen.product_unit')->latest()->take(6)->get();

        $articles = Article::with('writer')->latest()->take(6)->get();
        return view('livewire.home-page',[
            
            'articles' => $articles,
            'products' => $productQuery
        ]);
    }
}
