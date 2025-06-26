<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function subjects(){
        return view('home.subjects');
    }

    public function calendar(){
        return view('home.calendar');
    }
    public function bitacora(){
        return view('home.bitacora');
    }
}
