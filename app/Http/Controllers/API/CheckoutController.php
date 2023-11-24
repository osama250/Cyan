<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Trip;
use App\Models\Capine;
use App\Models\SideSeeing;
use App\Models\Cruise;
use App\Models\Reservation;
use App\Models\RservationCabines;
use App\Models\RservationAdon;


class CheckoutController extends Controller
{
    public function checkout( Request $request ) {

        if ( Auth()->check() ) {
            $user = Auth::user();
        }

        $validator = Validator::make($request->all(), [
            'cruise_id'      => 'required',
            'trip_id'        => 'required',
            'capine_id'      => 'required',
            'add_ons'        => 'sometimes|[]' ,    // Search
        ]);


        if ( $validator->fails() ) {
            return response()->json( [
                'error' => $validator->errors()
            ]);
        }

        // try {
                // put code here
        // } catch ( Excecption e ) {

        // }

        $cruise         = Cruise::find( request('cruise_id') );
        $trip           = Trip::find( request('trip_id') );
        $cabine         = Capine::find( request('capine_id') );
        // $sideSeeing     = SideSeeing::find( request('side_seeing_id') );

        $add_ons = request()->filled('add_ons') ? json_decode(request('add_ons')) : [];


            // Check Cabine is found or not
            // $check = RservationCabines::where( 'capine_id' , $cabine->id )
            //             ->where('cruise_id' , $cruise->id )->with('reservation' , function( $q ) {
            //             $q->select('trip_id');
            //         })->first();

                    $check = RservationCabines::where( 'capine_id' , $cabine->id )
                    ->where('cruise_id' , $cruise->id )->with( [ 'reservation' => function( $q ) {
                    $q->select('trip_id');
                } ] )->first();

            if ( $check )  {
                return response()->json( ["msg" => "Cabine Not Avalable Can not Rserved!"], 404);;
            }
            if ( !$check ) {
                return response()->json( ["msg" => "Cabine is Avalable !"] , 404 );;
            }

            // foreachCabines {

            // }



            $request['user_id']  = $user->id;

            $reservation = Reservation::create( [
                'trip_id'  => $trip->id ,
                'user_id'  => $user->id ,
                // 'price'    => $trip->price
            ]);

            foreach ( $request->capine_id as $cabine ) {
                $cabine['id'];
            }
    }
}
