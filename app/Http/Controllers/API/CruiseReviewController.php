<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cruise;
use App\Models\CruiseReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CruiseReviewController extends Controller
{
    public function addOrUpdateReview(Request $request){
        $validator = Validator::make($request->all(),[
            'cruise_id' => 'required|exists:cruises,id',
            'rate'=> 'required|numeric|min:0|max:5',
            'comment' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],403);
        }
        $review = CruiseReview::updateOrCreate([
            'cruise_id'=>$request->cruise_id,
            'user_id' => auth()->user()->id,
        ],
            [
                'cruise_id' => $request->cruise_id,
                'user_id' => auth()->user()->id,
                'rate' => $request->rate,
                'comment' => $request->comment
            ]
            );

        $cruise = Cruise::findOrFail($request->cruise_id);
        $cruise->update([
            'avg_rate' => $cruise->reviews->avg('rate'),
        ]);

        return response()->json(['message'=>__('lang.created'),'review'=>$review,'cruise'=>$cruise],200);
    }
}