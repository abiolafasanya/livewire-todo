<div>
    <div class="mx-10">
        <div>
            <h1 class="text-2xl p-2">Todo App</h1>
        </div>
        <div class="block p-3 my-3">
            <input 
                type="text" 
                placeholder="Add todo here"
                class="lg:w-1/2 rounded" 
                wire:model="title" 
                wire:keydown.enter="addTodo"
            >
        </div>

        @if($errors->has('title'))
            <div class="bg-red-300 text-red-800 mx-5 p-3 border-2 border-red-800">
                {{ $errors->first('title') }}
            </div>
        @endif
        {{-- <button class="bg-blue-500 text-blue-100 rounded p-3" wire:click="addTodo">Add</button> --}}

        <div>
            @if($todos)

            @foreach($todos as $todo)
            
            <div class="m-5 text-2xl">
                <input type="checkbox" wire:change="toggleTodo({{$todo->id}})" {{ $todo->completed ? 'checked' : ''}}>
                <a href=""
                 class="{{ $todo->completed ? 'text-pink-500' : ''}}">{{ $todo->title }}
                </a>
                <button wire:click="deleteTodo({{$todo->id}})" class="bg-red-500 rounded text-red-100 p-1">Delete</button>
            </div>

            @endforeach

            @else
                
                <div class="bg-red-300 text-red-800 p-3 border-2 border-red-800">No post to show</div>

            @endif
        </div>
    </div>
</div>
