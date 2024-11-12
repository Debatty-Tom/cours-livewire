<?php

namespace App\Livewire;

use App\Livewire\Forms\OrganizationForm;
use App\Models\Organization;
use Livewire\Component;

class OrganizationsCreate extends Component
{
    public $organization;
    public $feedback = '';
    public $spinner = false;
    public $loading;

    public OrganizationForm $form;
    public function mount(Organization $organization)
    {
        $this->form->setOrganization($organization);

        $this->organization = $organization;
        $this->organization->load('contacts');
    }
    public function save(){
        $this->form->create();
        $this->feedback='Organization created successfully';
    }

    public function render()
    {
        return view('livewire.organizations-create');
    }

    public function waitingToRedirect()
    {
        $organization = $this->organization;

        $page_id = floor($organization->id / 10);

        return $this->redirect('/organizations?page='.$page_id, navigate: true);
    }


}
