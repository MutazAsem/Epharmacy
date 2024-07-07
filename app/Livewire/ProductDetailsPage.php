<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Product Details - Epharmacy')]

class ProductDetailsPage extends Component
{
    

    public function render()
    {
        return view('livewire.product-details-page');
    }
}
