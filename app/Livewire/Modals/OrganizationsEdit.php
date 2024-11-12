<?php

namespace App\Livewire\Modals;

use Livewire\Component;

class OrganizationsEdit extends Component
{
    public $organization;

    public function mount($organization)
    {
        $this->organization = $organization;
    }

    public function render()
    {
        return view('livewire.modals.organizations-edit');
    }
}
