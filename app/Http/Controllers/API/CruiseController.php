<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cruise;
use Illuminate\Http\Request;

class CruiseController extends Controller
{
    public function cruises(){
        return response()->json(['cruises'=>Cruise::all()],200);
    }

    public function cruise($id){
        $cruise = Cruise::findOrFail($id);
        $cruise->load(['featurePhotos','photos','capines','facilites', 'facilites.activities','trips','trips.photos', 'iteneraries','reviews']);
        return response()->json(['cruise'=>$cruise],200);
    }
}