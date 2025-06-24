<div>
    <div class="grid grid-cols-3 gap-4">
        <div style="">

            <button wire:click="increment">+</button>

        </div>
        <div style="">
            <button wire:click="decrement">-</button>

        </div>
        <div style="">

            <h1>{{ $count }}</h1>
        </div>

    </div>


</div>
