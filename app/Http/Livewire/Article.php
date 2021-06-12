<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article as Articles;

use Livewire\WithPagination;

class Article extends Component
{

    use WithPagination;

    public $title;

    public $body;

    public function addArticle()
    {
        $article = Articles::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'body' => $this->body,
        ]);

        session()->flash('message', 'New article added 😃');
    }
    
    public function render()
    {
        return view('livewire.article', [
            // "articles" => auth()->user()->articles
            "articles" => Articles::where('user_id', auth()->id())->latest()->paginate(2),
        ]);
    }

    public function deleteArticle($id)
    {
        $article = Articles::find($id);
        $article->delete();

        session()->flash('message', 'Article has been removed 🚨');
    }

    public function editArticle($id)
    {
        session()->flash('message', 'You just clicked on update button');
        
    }
}
