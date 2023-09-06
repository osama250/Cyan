<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ChooseUs;
use Illuminate\Http\Request;

class chooseUsController extends Controller
{
    public function choose() {
            return response()->json( [ 'cancel'  => ChooseUs::all() ] , 200 );
    }

}
