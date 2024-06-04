<?php
namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Fábio',
                'email' => 'fabio.ferreira@noop.pt',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('laravelstarter_fabio_0'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Tiago',
                'email' => 'tiago.carrao@noop.pt',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('laravelstarter_tiago_0'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
        $users = User::all();
        foreach($users as $user){
            $user->assignRole(Role::ROLE_SUPER_ADMIN);
        }
    }
}
