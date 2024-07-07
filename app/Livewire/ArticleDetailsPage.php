<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Article Details - Epharmacy')]

class ArticleDetailsPage extends Component
{
    

    public function render()
    {
        return view('livewire.article-details-page');
    }
}
