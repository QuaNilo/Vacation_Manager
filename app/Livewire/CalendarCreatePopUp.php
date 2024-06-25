<?php

namespace App\Livewire;

use App\Models\Vacation;
use Carbon\Carbon;
use Livewire\Component;

class CalendarCreatePopUp extends Component
{
    public $vacation;
    public $selectedVacationStartDate;
    protected $listeners = ['vacationCreate'];

    public function mount(){
        $this->vacationCreate();
    }

        public function vacationCreate($date = null)
    {
        if($date !== null){
            dd($date);
        }
        $this->vacation = new Vacation();
        if ($date !== null) {
            $this->vacation->start = Carbon::parse($date)->format('Y-m-d');
        }
    }

    public function render()
    {
        return view('livewire.calendar-create-pop-up');
    }
}
