<?php

namespace App\Livewire;

use App\Models\Team;
use Illuminate\Http\Request;
use Livewire\Component;

class ManageTeam extends Component
{

    public $teams;
    public $team_id;
    public $user;
    public $userTeam;

public function saveTeam()
    {
        $this->validate([
            'team_id' => 'required|exists:teams,id',
        ]);

        $team = Team::find($this->team_id);
        if ($team) {
            $user = $this->user;
            $user->team()->associate($team);
            $user->save();

        } else {
            return redirect()->route('display_warning', ['message' => __("Failed to save user's team")]);
        }
    }

    public function deleteTeam()
    {
        if (!empty($this->user->team())) {
            $user = $this->user;
            $user->team()->dissociate();
            $user->save();
        } else {
            return redirect()->route('display_warning', ['message' => __("Failed to delete user's team")]);
        }
    }
    public function mount()
    {
        $this->userTeam = $this->user->team()->first();
        $company = auth()->user()->company()->first();
        $this->teams = $company?->teams()->get();
    }
    public function render()
    {
        return view('livewire.profile.manage-team');
    }
}
