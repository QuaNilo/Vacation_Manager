<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class LatestVacationsTable extends Component
{
    use WithPagination;

    public $user;
    public $company;
    public $vacations;

    public function mount()
    {
        $this->user = auth()->user();
        $this->company = $this->user->company()->first();
        $this->vacations = $this->getVacations();
    }

    private function getVacations()
    {
        return $this->company->vacations()->orderByDesc('vacation_start')->get();
    }

    public function render()
    {
        return view('livewire.latest-vacations-table');
    }
}
