<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function offer($id)
    {
        return response()->json(['offers' => Offer::findOrFail($id)->load(['trip', 'trip.photos'])], 200);
    }
}