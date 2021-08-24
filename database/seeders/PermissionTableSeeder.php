<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();

        $permission->name = 'Administrator';
        $permission->description = 'In charge of system management, with total control.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Only view';
        $permission->description = 'You can only view the site, without the ability to edit anything.';
        $permission->save();
    }
}
