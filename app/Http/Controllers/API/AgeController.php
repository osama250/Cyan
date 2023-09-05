<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Age;
use Illuminate\Http\Request;

class AgeController extends Controller
{
    public function ages(){
        return response()->json(['ages'=>Age::all()],200);
    }
}
