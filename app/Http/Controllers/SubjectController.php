<?php

namespace App\Http\Controllers;

use App\Models\Matter;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Matter $matter){
        return view('subjects.index', compact('matter'));
    }


    public function view(Subject $subject){
        return view('subjects.view', compact('subject'));
    }

    public function attachments(Subject $subject){
        return view('subjects.attachments', compact('subject'));
    }

    public function tasks(Subject $subject){
        return view('subjects.tasks', compact('subject'));
    }
    
    public function create(Matter $matter){
        return view('subjects.create', compact('matter'));
    }
}
