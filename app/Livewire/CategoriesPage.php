<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Categories - Epharmacy')]

class CategoriesPage extends Component
{
    

    public function render()
    {
        $categories = Category::where('status',1)->get();

        return view('livewire.categories-page',[
            'categories' => $categories
        ]);
    }
}
