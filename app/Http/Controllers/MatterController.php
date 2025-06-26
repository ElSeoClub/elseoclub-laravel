<?php

namespace App\Http\Controllers;

use App\Models\Matter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MatterController extends Controller
{
    public function index(){
        return view('matters.index');
    }

    public function create(){
        return view('matters.create');
    }

    public function edit(Matter $matter){
        return view('matters.edit', compact('matter'));
    }
}
