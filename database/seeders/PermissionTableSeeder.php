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

        $permission->name = 'Jurídico';
        $permission->description = 'Personal encargado de revisar la evidencia de los eventos.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Organización';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Global';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Baja California';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Baja California Sur';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Bajío';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'CEN/CNJ';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Centro Occidente';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Centro Oriente';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Centro Sur';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Corporativo';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'G. y T. Central';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Golfo Centro';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Golfo Norte';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Jalisco-Nayarit';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Noroeste';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Norte';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Oriente';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Peninsular';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Sinaloa';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Sonora';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Sureste';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Valle de México Centro';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Valle de México Norte';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'Valle de México Sur';
        $permission->description = 'Personal encargado de registro de asistencia, llenado de actas parciales y subir evidencia.';
        $permission->save();
    }
}
