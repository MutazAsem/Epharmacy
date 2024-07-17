<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Layouts\Navbar;
use App\Models\Category;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Shop - Epharmacy')]

class ShopPage extends Component
{

    use WithPagination;

    use LivewireAlert;

    #[Url]

    public $selectedCategories = [];
    public $productUnitId;
    public $cartItems = [];
    public $grandTotal;

    // #[Url]
    // public $priceRange = 1000;

    // Add item to Cart
    public function addToCart($productId, $productUnitId)
    {
        $this->cartItems = CartManagement::addItemToCart($productId, $productUnitId);
        $this->grandTotal = CartManagement::calculateGrandTotal($this->cartItems);

        $this->dispatch('update-cart-total', grandTotal: $this->grandTotal)->to(Navbar::class);
        $this->dispatch('update-cart-count' , totalCount: count($this->cartItems))->to(Navbar::class);

        $this->alert('success', 'Product added to the cart successfully', [
            'position' => 'bottom-end',
            'timer' => 1600,
            'toast' => true,
        ]);
    }

    public function render()
    {
        $categories = Category::where('status', 1)->get(['id', 'name']);

        $productQuery = Product::query()
            ->where('status', 1)
            ->with('product_measuremen.product_unit');

        if (!empty($this->selectedCategories)) {
            $productQuery->whereIn('category_id', $this->selectedCategories);
        }

        return view('livewire.shop-page', [
            'products' => $productQuery->paginate(12),
            'categories' => $categories,
        ]);
    }
}
