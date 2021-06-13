<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Article as Articles;

use Livewire\WithPagination;

use Livewire\WithFileUploads;

class Article extends Component
{

    use WithPagination;

    use WithFileUploads;

    public $title;
    public $body;
    public $photo;

    protected $rules = [
        'title' => 'required|min:3',
        'body' => 'required',
        'photo' => 'required|max:1024'
    ];

    public function addArticle()
    {
        $this->validate();  

        $this->photo->store('public');

        $article = Articles::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $this->title = '';
        $this->body = '';
        $this->photo = '';

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
        session()->flash('message', 'You just clicked on update button 🛩️');
        
    }
}
