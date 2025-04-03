<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StreetController extends Controller
{
    public function test(Request $request)
    {
        // Obtener el valor del parámetro 'd' de la solicitud
        $d = $request->query('d');

        // Retornar una respuesta JSON con el valor de 'd'
        return response()->json([
            'message' => 'Recieved data',
            'data_received' => $d,
        ]);
    }
}