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

    public function deleteVacation($id){
        $vacation = Vacation::find($id);
        if($vacation){
            $vacation->delete();
            flash(__('Vacation deleted successfully'))->overlay()->success()->duration(4000);
        }else{
            flash(__('Vacation not found'))->overlay()->warning()->duration(4000);
        }
        return redirect(route('calendar.index'));
    }
    public function render()
    {
        return view('livewire.calendar-edit-pop-up');
    }
}
