<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MoviesPopular extends Component
{
    public function render()
    {
        return view('livewire.movies-popular');
    }

    public function info(){
        return redirect()->to('/movie');
    }
}
