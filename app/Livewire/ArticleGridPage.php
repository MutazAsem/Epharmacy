<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;



#[Title('Articles - Epharmacy')]

class ArticleGridPage extends Component
{
    use WithPagination;


    public function render()
    {
        $articles = Article::with('writer');

        return view('livewire.article-grid-page',[
            'articles' => $articles->paginate(6),
        ]);
    }
}
