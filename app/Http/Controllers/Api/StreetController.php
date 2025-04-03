<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;

class StreetController extends Controller
{
    public function test(Request $request)
    {
        // Obtener el valor del parámetro 'd' de la solicitud
        $d = $request->query('d');

        $pos = strpos($d, 'ID:');

        // Extraer el dígito después de "ID:"
        if ($pos !== false) {
            $idValue = substr($d, $pos + 3, 1); // +3 para saltar "ID:" y tomar 1 carácter
            History::create([
                'oid' => $idValue,
                'value' => $d,
            ]);
        } else {
        }

        // Retornar una respuesta JSON con el valor de 'd'
        return response()->json([
            'message' => 'Recieved data',
            'data_received' => $d,
        ]);
    }
}