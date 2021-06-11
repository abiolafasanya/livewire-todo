<div>
    <h1 class="text-3xl">
        <button wire:click="increment">Add + </button>
        {{ $count }}
        <button wire:click="decrement">Subtract - </button>
        <br>
        <input type="text" wire:model="msg">

        {{ $msg }}
    </h1>
</div>
