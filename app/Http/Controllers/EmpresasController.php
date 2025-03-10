<?php

namespace App\Http\Controllers;

use App\Models\Folder;

class EmpresasController extends Controller
{
    public function index(){
        return view('empresas.index');
    }

    public function folder(Folder $folder){
        return view('empresas.folder', compact('folder'));
    }

    public function create(){
        return view('empresas.create');
    }
    public function createChild(Folder $folder){
        return view('empresas.create', compact('folder'));
    }

    public function file(Folder $folder){
        return view('empresas.file', compact('folder'));
    }
}
