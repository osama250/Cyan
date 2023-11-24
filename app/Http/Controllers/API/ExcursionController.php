<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Excursion;
use Illuminate\Http\Request;

class ExcursionController extends Controller
{
    public function excursions() {
        return response()->json( ['excursions'=>Excursion::all() ] ,200 );
    }

    public function excursionsImg() {
        return response()->json( ['excursions' => Excursion::select('image')->get() ] , 200 );
    }
}
