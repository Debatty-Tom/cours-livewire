{{--
avec livewire car requète ajax donc relation server client
<div class="flex gap-5" >
    <button class="backdrop-opacity-50 border border-black rounded bg-clip-padding p-2" wire:click="decrement">-</button>
    <span class="p-2">
        {{ $counter }}
    </span>
    <button class="backdrop-opacity-50 border border-black rounded bg-clip-padding p-2" wire:click="increment">+</button>
</div>

--}}

{{--ici avec alpinejs car pas de requètes server a faire donc plus éfficace--}}
<div class="flex gap-5" x-data="{
counter: 0,
    increment() {
        this.counter++
    },
    decrement() {
        this.counter--
    }
}">
    <button class="backdrop-opacity-50 border border-black rounded bg-clip-padding p-2" @click="decrement">-</button>
    <span class="p-2" x-html="counter"></span>
    <button class="backdrop-opacity-50 border border-black rounded bg-clip-padding p-2" @click="increment">+</button>
</div>
