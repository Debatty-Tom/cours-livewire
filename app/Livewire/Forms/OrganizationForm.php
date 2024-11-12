<?php

namespace App\Livewire\Forms;

use App\Models\Account;
use App\Models\Organization;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OrganizationForm extends Form
{
    public Organization $organization;
    #[Validate]
    public $name;
    #[Validate]
    public $email;
    #[Validate]
    public $phone;
    #[Validate]
    public $address;
    #[Validate]
    public $city;
    #[Validate]
    public $region;
    #[Validate]
    public $country;
    #[Validate]
    public $postal_code;
    #[Validate]
    public $account_id;
    #[Validate]

    public function setOrganization($organisation)
    {
        $this->organization = $organisation;
        $this->account_id = $organisation->account_id;
        $this->name = $organisation->name;
        $this->email = $organisation->email;
        $this->phone = $organisation->phone;
        $this->address = $organisation->address;
        $this->city = $organisation->city;
        $this->region = $organisation->region;
        $this->country = $organisation->country;
        $this->postal_code = $organisation->postal_code;
    }
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:100','nullable'],
            'email' => ['email', 'max:50', 'nullable'],
            'phone' => ['max:50', 'nullable'],
            'address' => ['max:150', 'nullable'],
            'city' => ['max:50', 'nullable'],
            'region' => ['max:50', 'nullable'],
            'country' => ['max:2', 'nullable'],
            'postal_code' => ['max:25', 'nullable'],
            'account_id' => ['required','int', 'nullable'],
        ];
    }

    public function update()
    {
        $this->validate();

        $this->organization->update($this->except('organization'));
    }

    public function create()
    {
        $this->account_id = Account::find(1)->id;

        $this->validate();

        Organization::create($this->all());
    }
}
