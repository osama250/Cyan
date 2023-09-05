<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Capine;
use Illuminate\Http\Request;

class CapineController extends Controller
{
    public function capines() {
        return response()->json( [ 'capines' => Capine::all() ] , 200 );
    }
}
