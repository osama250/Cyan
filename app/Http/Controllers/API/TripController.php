<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function trip($id){
        return response()->json([ 'trip' => Trip::findOrFail($id)->load(
            ['photos','cruise', 'cruise.facilites','cruise.reviews'] ) ] ,200 );
    }
}
