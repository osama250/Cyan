<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cancellation_Policy;

class cancellationPolicyController extends Controller
{
    public function cancel() {
            return response()->json( [ 'cancel'  => Cancellation_Policy::all() ] , 200 );
    }
}
