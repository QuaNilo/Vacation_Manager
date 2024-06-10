<?php

namespace App\Livewire;

use App\Models\Vacation;
use Livewire\Component;

class CalendarEditPopUp extends Component
{
    public $vacation;
    public $selectedVacationId;
    protected $listeners = ['vacationUpdated'];

    public function mount(){
        $this->vacationUpdated();
    }

        public function vacationUpdated($id = null)
    {
        $this->selectedVacationId = $id;
        $this->vacation = Vacation::find($this->selectedVacationId) ?? new Vacation();
    }

    public function render()
    {
        return view('livewire.calendar-edit-pop-up');
    }
}
