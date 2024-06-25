<?php

namespace App\Livewire;

use App\Models\Vacation;
use Carbon\Carbon;
use Livewire\Component;

class CalendarCreatePopUp extends Component
{
    public $selectedVacationStartDate;
    protected $listeners = ['vacationCreate'];

    public function mount(){
        $this->vacationCreate();
    }

        public function vacationCreate($date = null)
    {
        if($date !== null){
            $this->selectedVacationStartDate = Carbon::parse($date)->format('Y-m-d');
        }
        else{
            $this->selectedVacationStartDate = '';
        }
    }

    public function render()
    {
        return view('livewire.calendar-create-pop-up');
    }
}
