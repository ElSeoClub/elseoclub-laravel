<?php

namespace App\Http\Controllers;

use App\Models\Asunto;
use Illuminate\Http\Request;

class AsuntosController extends Controller
{
    public function index(){

        return view('asuntos.index');
    }

    public function crear(){

        return view('asuntos.crear');
    }

    public function asunto(Asunto $asunto){

        return view('asuntos.asunto', compact('asunto'));
    }
}
