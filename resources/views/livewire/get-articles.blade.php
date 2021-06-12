<div>

    <h1 class="text-2xl">{{ $name }}</h1>
    <div class="px-10 py-5 mx-auto container">

        <div>
            @if(session()->has('message'))
                <div class="bg-green-300 text-green-800 border-2 border-green-800 mx-auto my-5 rounded p-3">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        @if($articles)

            @foreach ($articles as $article)
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
            @endforeach
            
        @endif
    </div>

</div>
