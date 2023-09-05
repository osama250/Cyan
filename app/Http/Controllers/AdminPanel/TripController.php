<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateTripRequest;
use App\Http\Requests\AdminPanel\UpdateTripRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Cruise;
use App\Models\Trip;
use App\Models\TripPhoto;
use App\Repositories\TripRepository;
use Illuminate\Http\Request;
use Flash;

class TripController extends AppBaseController
{
    /** @var TripRepository $tripRepository*/
    private $tripRepository;

    public function __construct(TripRepository $tripRepo)
    {
        $this->tripRepository = $tripRepo;

        $this->middleware('permission:View Trip|Add Trip|Edit Trip|Delete Trip', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Trip', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Trip', ['only' => ['edit', 'update', 'deletePhoto']]);
        $this->middleware('permission:Delete Trip', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Trip.
     */
    public function index(Request $request)
    {
        $trips = $this->tripRepository->all();

        return view('AdminPanel.trips.index',get_defined_vars());
    }


    public function create()
    {
        $cruises = Cruise::all();
        return view('AdminPanel.trips.create',get_defined_vars());
    }


    public function store(CreateTripRequest $request)
    {
        $input = $request->all();

        $trip = $this->tripRepository->create($input);

        foreach ($request->photos as $photo) {
            $trip->photos()->create([
                'photo' => $photo,
            ]);
        }

        return redirect(route('trips.index'))->with('success',__('lang.created'));
    }


    // public function show($id)
    // {
    //     $trip = $this->tripRepository->find($id);

    //     if (empty($trip)) {
    //         Flash::error('Trip not found');

    //         return redirect(route('trips.index'));
    //     }

    //     return view('trips.show')->with('trip', $trip);
    // }


    public function edit($id)
    {
        $trip = Trip::findOrFail($id);

        $cruises = Cruise::all();

        return view('AdminPanel.trips.edit',get_defined_vars());
    }


    public function update($id, UpdateTripRequest $request)
    {
        $trip = Trip::findOrFail($id);


        $trip = $this->tripRepository->update($request->all(), $id);

        if($request->photos){
            foreach ($request->photos as $photo) {
                $trip->photos()->create([
                    'photo' => $photo,
                ]);
            }
        }

        return redirect(route('trips.index'))->with('success',__('lang.updated'));
    }


    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);



        $this->tripRepository->delete($id);

        return redirect(route('trips.index'))->with('error',__('lang.deleted'));
    }

    public function deletePhoto($id)
    {
        TripPhoto::findOrFail($id)->delete();
        return response([], 200);
    }
}
