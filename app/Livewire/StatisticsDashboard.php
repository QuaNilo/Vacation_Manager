<?php

namespace App\Livewire;

use App\Models\Vacation;
use Illuminate\Support\Carbon;
use Livewire\Component;

class StatisticsDashboard extends Component
{
    public $team;
    public $user;
    public $vacation_days_taken_year;
    public $vacation_days_available;
    public $vacation_requests_pending;

    public function mount()
    {
        $this->user = auth()->user();
        $this->team = $this->user->team()->get();
        $this->vacation_days_taken_year = $this->getVacationDaysTakenYear();
        $this->vacation_days_available = $this->getVacationDaysAvailable();
        $this->vacation_requests_pending = $this->getVacationRequestsPending();
    }

    protected function getVacationRequestsPending()
    {
        return $this->user->vacations()->where('approved', Vacation::STATUS_PENDING)->count();
    }

    protected function getVacationDaysAvailable()
    {
        return $this->user->vacation_days;
    }

    protected function getVacationDaysTakenYear()
    {
        return $this->user->vacations()
            ->whereYear('start', Carbon::now()->year)
            ->sum('vacation_days');
    }

    public function render()
    {
        return view('livewire.statistics-dashboard');
    }
}
