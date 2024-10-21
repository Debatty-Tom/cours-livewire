<div>
    <input type="text"
           wire:model.live.debounce.300ms="name">
    <span>{{ $name }}</span>
    <div>
        {{ $user->name }}
    </div>
</div>
