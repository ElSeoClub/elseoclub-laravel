<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $user->password = Hash::make('1nuy45h4');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'admin')->first());

        $user = new User();
        $user->username = "9L51Y";
        $user->name = "Lucio Vargas Galvan";
        $user->email = 'lucio.vargas@cfe.mx';
        $user->password = Hash::make('Lucio83');
        $user->permission_id = 3;
        $user->save();
        $user->roles()->attach(Role::where('name', 'abogado')->first());

        $user = new User();
        $user->username = "Irma";
        $user->name = "Irma";
        $user->email = 'irma@cfe.mx';
        $user->password = Hash::make('Irma23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'adminjuridico')->first());
    }
}
