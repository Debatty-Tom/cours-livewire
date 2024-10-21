<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ReactiveInput extends Component
{
    public $name = '';

    public $user;

    public function mount()
    {
        $this->user = User::whereEmail('johndoe@example.com')->first();
    }
    public function render()
    {
        $user = $this->user;

        return view('livewire.reactive-input', compact('user'));
    }
}
