<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function terms(){
        return response()->json(['terms' => Term::first()],200);
    }
}