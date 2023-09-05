<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Excursion;
use Illuminate\Http\Request;

class ExcursionController extends Controller
{
    public function excursions(){
        return response()->json(['excursions'=>Excursion::all()],200);
    }
}
