<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function empresas(){
        return view('test.empresas');
    }

    public function cfe(){
        return view('test.cfe');
    }

    public function contratos(){
        return view('test.contratos');
    }
}
