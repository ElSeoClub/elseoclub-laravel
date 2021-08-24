<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = "suvstar";
        $user->name = "Ricardo Ballesteros Huazano";
        $user->email = 'suvager@gmail.com';
        $user->password = '$2y$10$1qXs2VzJzyNxFDzlNFPml.MxYmXy/unXDmpEI8C/IaMgbFn3iq7nS';
        $user->permission_id = 1;
        $user->save();

        $user->roles()->attach(Role::where('name', 'admin')->first());

        // Fake data
        User::factory(200)->create();
    }
}
