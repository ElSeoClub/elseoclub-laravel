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
        $user->username = "9N43J";
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
        $user->password = Hash::make('Lucio23');
        $user->permission_id = 3;
        $user->save();
        $user->roles()->attach(Role::where('name', 'adminjuridico')->first());

        $user = new User();
        $user->username = "87010";
        $user->name = "Marcela Alicia Tellez Bello";
        $user->email = 'marcela.tellez@cfe.mx';
        $user->password = Hash::make('Marcela23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'adminjuridico')->first());


        $user = new User();
        $user->username = "00304";
        $user->name = "Irma Garcia Gonzalez";
        $user->email = 'irma.garcia@cfe.mx';
        $user->password = Hash::make('Irma23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'adminjuridico')->first());

        $user = new User();
        $user->username = "84089";
        $user->name = "Leonardo Medina Rivera";
        $user->email = 'leonardo.medina@cfe.mx';
        $user->password = Hash::make('Marcela23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'abogado')->first());

        $user = new User();
        $user->username = "9MLYY";
        $user->name = "Enrique Martiniez Zarate";
        $user->email = 'enrique.martinez@cfe.mx';
        $user->password = Hash::make('Enrique23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'abogado')->first());

        $user = new User();
        $user->username = "00346";
        $user->name = "Allan Abdel Morteo Saavedra";
        $user->email = 'allan.morteo@cfe.mx';
        $user->password = Hash::make('Allan23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'abogado')->first());

        $user = new User();
        $user->username = "88886";
        $user->name = "Edmundo Benitez Ayala";
        $user->email = 'edmundo.benitez@cfe.mx';
        $user->password = Hash::make('Edmundo23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'abogado')->first());

        $user = new User();
        $user->username = "1B536";
        $user->name = "Alfonso Gomez Carlos";
        $user->email = 'alfonso.gomez@cfe.mx';
        $user->password = Hash::make('Alfonso23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'abogado')->first());

        $user = new User();
        $user->username = "9L3LK";
        $user->name = "Karla Johanna Guzman Valdes";
        $user->email = 'karla.guzman@cfe.mx';
        $user->password = Hash::make('Karla23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'abogado')->first());

        $user = new User();
        $user->username = "9L4VY";
        $user->name = "Daniel de la Guerra Guevara";
        $user->email = 'daniel.guerra@cfe.mx';
        $user->password = Hash::make('Daniel23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'abogado')->first());

        $user = new User();
        $user->username = "87366";
        $user->name = "Silvia Davila Perez";
        $user->email = 'silvia.davila@cfe.mx';
        $user->password = Hash::make('Silvia23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'abogado')->first());

        $user = new User();
        $user->username = "9N0WU";
        $user->name = "Maria Fernanda Ramirez Rivera";
        $user->email = 'fernanda.ramirez@cfe.mx';
        $user->password = Hash::make('Fernanda23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'abogado')->first());

        $user = new User();
        $user->username = "1B537";
        $user->name = "Catherine Zulema Arenas Marquez";
        $user->email = 'catherine.arenas@cfe.mx';
        $user->password = Hash::make('Catherine23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'abogado')->first());

        $user = new User();
        $user->username = "1B121";
        $user->name = "Alejandro Cruz Gonzalez";
        $user->email = 'alejandro.cruz@cfe.mx';
        $user->password = Hash::make('Alejandro23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'abogado')->first());

        $user = new User();
        $user->username = "1B944";
        $user->name = "Guillermo Flores Hernandez";
        $user->email = 'guillermo.flores@cfe.mx';
        $user->password = Hash::make('Guillermo23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'abogado')->first());

        $user = new User();
        $user->username = "86702";
        $user->name = "Felipe de Jesus Lopez Buendia";
        $user->email = 'felipe.lopez@cfe.mx';
        $user->password = Hash::make('Felipe23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'abogado')->first());

        $user = new User();
        $user->username = "9MLFJ";
        $user->name = "Alejandra Zugeily Rodriguez Chavez";
        $user->email = 'alejandra.rodriguez@cfe.mx';
        $user->password = Hash::make('Alejandra23');
        $user->permission_id = 1;
        $user->save();
        $user->roles()->attach(Role::where('name', 'abogado')->first());
    }
}
