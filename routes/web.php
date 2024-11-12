<?php

use App\Livewire\OrganizationsCreate;
use App\Livewire\OrganizationsEdit;
use App\Livewire\OrganizationsTable;
use App\Models\Organization;
use Illuminate\Support\Facades\Route;

Route::get('/organizations', OrganizationsTable::class)->name('organizations.index');

Route::get('/organizations/{organization}/edit', OrganizationsTable::class)->name('organizations.edit');

Route::get('/organizations/create', OrganizationsTable::class)->name('organizations.create');
