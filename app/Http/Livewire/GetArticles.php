<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Article;

class GetArticles extends Component
{
    public $name = 'Article list';

    public function render()
    {
        return view('livewire.get-articles', [
            "articles" => auth()->user()->articles
        ]);
    }

    public function deleteArticle($id)
    {
        $article = Article::find($id);
        $article->delete();

        session()->flash('message', 'Article has been removed 🚨');
    }

    public function editArticle($id)
    {
        session()->flash('message', 'You just clicked on update button');
        
    }
}
