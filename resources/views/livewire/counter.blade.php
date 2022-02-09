<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <h1>Hello World!</h1>

    <div style="text-align: center">
        <button wire:click="increment">+</button>
        <h1>{{ $count }}</h1>
    </div>

    <div style="text-align: center">
        <button wire:click="decrement">-</button>
    </div>
</div>
