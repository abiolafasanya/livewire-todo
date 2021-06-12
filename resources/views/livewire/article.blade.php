<div>
    <h1 class="text-4xl text-center text-blue-700">Articles Blog</h1>
    
    <br>
    <form wire:submit.prevent="addArticle">
        <div>
            @if(session()->has('message'))
                <div class="bg-green-300 text-green-800 border-2 border-green-800 rounded p-3">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="block px-20">
            <label for="" class=""> Title </label>
            <input type="text" class="bg-blue-100 mt-2 p-3 block rounded w-full" wire:model="title">
        </div>
        
        <div class="block px-20">
            <label for="" class="">Body</label>
            <textarea name="" class="w-full block mt-2 p-3 rounded" wire:model="body"></textarea>
        </div>

        <button class="bg-blue-500 text-blue-100 mx-20 mt-3 p-3 rounded">Add Aricle</button>
    </form>

    <div class="px-10 py-5 mx-auto container">

        @foreach ($articles as $article)
            @if($article === 0)

            <div class="bg-gray-100 w-4/5 text-gray-500 container rounded p-3 mx-auto border-gray-500 shadow-lg ">
                No Article to show
            </div>
            @else

            <div class="lg:flex justify-between items-center bg-gray-200 text-gray-800 rounded p-3 shadow-sm mb-3">
                <div>
                    <h1 class="text-2xl">{{ ($article->title) }}</h1>
                    <p>{{ $article->body }}</p>
                    <time class="text-blue-500"> {{ $article->created_at }} </time>
                </div>
                <div>
                    <button 
                        wire:click="editArticle({{ $article->id }})"
                        class="bg-blue-500 text-blue-100 p-2 rounded hover:bg-blue-400"
                        >Edit
                    </button>
                    <button 
                        wire:click="deleteArticle({{ $article->id }})"
                        class="bg-red-500 text-red-100 p-2 rounded hover:bg-red-400"
                        >Delete
                    </button>
                </div>
            </div>

            @endif
        @endforeach

        {{ $articles->links() }}
    </div>
</div>