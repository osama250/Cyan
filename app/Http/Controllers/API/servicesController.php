<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class servicesController extends Controller
{
    public function services() {
        return response()->json( [ 'cancel'  => Service::all() ] , 200 );
    }
}
