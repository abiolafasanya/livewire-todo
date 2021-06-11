<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Todo as Todos;


class Todo extends Component
{
    public $title = '';

    

    public function render()
    {
        return view('livewire.todo', [
            "todos" => auth()->user()->todos
        ]);
    }

    public function addTodo()
    {
     
        $this->validate([
            'title' => 'required',
        ]);

        Todos::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'completed' => false,
        ]);
    }

    public function toggleTodo($id)
    {
        $todo = Todos::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function deleteTodo($id)
    {
        Todos::destroy($id);
    }
}
