<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StreetController extends Controller
{
    public function test(Request $request)
    {
        return response()->json([
            'message' => 'Hello, this is a test response from the StreetController!'
        ]);
    }
}
