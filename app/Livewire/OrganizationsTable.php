<?php

namespace App\Livewire;

use App\Models\Account;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class OrganizationsTable extends Component
{
    use WithPagination;
    public $account;
    public $search;
    public function mount()
    {
        $this->account = Account::whereName('Acme Corporation')->first();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
    #[computed]
    public function organizations()
    {
        return $this->account
            ->organizations()
            ->orderBy('name')
            ->filter(['search' =>$this->search])
            ->paginate(10);
    }
    public function render()
    {
        return view('livewire.organizations-table');
    }
}
