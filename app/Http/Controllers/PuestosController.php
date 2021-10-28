<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PuestosController extends Controller
{
    public function index()
    {
        return view('puestos.index');
    }
}
