<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new Tipo();
        $tipo->nombre = 'Demanda';
        $tipo->save();
        $tipo = new Tipo();
        $tipo->nombre = 'Otros';
        $tipo->save();

    }
}
