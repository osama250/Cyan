<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function policies(){
        return response()->json(['policy' => Policy::first()],200);
    }
}