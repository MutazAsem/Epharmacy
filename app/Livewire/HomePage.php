<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Home - Epharmacy')]

class HomePage extends Component
{
    
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
