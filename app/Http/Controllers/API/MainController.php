<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\Cruise;
use App\Models\Excursion;
use App\Models\Offer;
use App\Models\SideSeeing;
use App\Models\SocialMedia;
use App\Models\Term;
use App\Models\Trip;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function homepage(){
        return response()->json([
            'excursions' => Excursion::all(),
            'sighseeing' => SideSeeing::all(),
            'about_us' => AboutUs::first(),
            'social_media' => SocialMedia::all(),
            'offers' => Offer::with(['trip', 'trip.photos'])->paginate(8),
            'terms' => Term::first(),
            'contact_us' => Contact::all(),
            'cruises' => Cruise::all(),
            'trips' => Trip::paginate(8),
        ],200);
    }
}
