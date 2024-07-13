<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Article Details - Epharmacy')]

class ArticleDetailsPage extends Component
{
    public $id;

    public function mount($id){
        $this->id = $id;
    }

    public function render()
    {
        $article = Article::where('id',$this->id)->with('writer')->firstOrFail();

        return view('livewire.article-details-page',[
            'article' => $article,
        ]);
    }
}
