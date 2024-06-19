<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Log;

class UpdateVacationDays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vacation:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update user vacation days based on team regeneration monthly value';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::with('team')->get();

        foreach ($users as $user) {
            if($user->team){
                $user->vacation_days += $user->team->members_vacation_days_regen_monthly;
                $user->save();
                Log::info("Updated vacation days for user ID {$user->id}");
            }
        }

        $this->info('User vacation days have been updated successfully.');

        return 0;
    }
}
