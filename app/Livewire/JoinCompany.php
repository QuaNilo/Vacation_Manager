<?php

namespace App\Livewire;

use Livewire\Component;

class JoinCompany extends Component
{
    public $hasPendingRequest;
    public $companyRequested;
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
        if(auth()->user()->company_join_request == 2){
            $this->hasPendingRequest = true;
            $this->companyRequested = auth()->user()->company()->first();
        }
    }
    public function render()
    {
        return view('livewire.join-company');
    }
}
