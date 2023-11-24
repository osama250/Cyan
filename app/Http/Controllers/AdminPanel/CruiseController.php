<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateCruiseRequest;
use App\Http\Requests\AdminPanel\UpdateCruiseRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Capine;
use App\Models\Cruise;
use App\Models\CruiseCapine;
use App\Models\CruiseFacilite;
use App\Models\CruiseItenerarie;
use App\Models\CruisePhoto;
use App\Models\Facilite;
use App\Models\FeaturePhoto;
use App\Repositories\CruiseRepository;
use Illuminate\Http\Request;

class CruiseController extends AppBaseController
{
    /** @var CruiseRepository $cruiseRepository*/
    private $cruiseRepository;

    public function __construct(CruiseRepository $cruiseRepo)
    {
        $this->cruiseRepository = $cruiseRepo;

        $this->middleware('permission:View Cruise|Add Cruise|Edit Cruise|Delete Cruise', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Cruise', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Cruise', ['only' => ['edit', 'update','deletePhoto','deleteCapine', 'deleteItenerarie']]);
        $this->middleware('permission:Delete Cruise', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $cruises = $this->cruiseRepository->all();

        return view('AdminPanel.cruises.index',get_defined_vars());
    }


    public function create()
    {
        $facilites = Facilite::all();
        $capines = Capine::all();
        return view('AdminPanel.cruises.create',get_defined_vars());
    }


    public function store(CreateCruiseRequest $request)
    {
        $request['facility_id'] = array_diff($request->facility_id, ['all']);
        $input = $request->all();

        $cruise = $this->cruiseRepository->create($input);

        foreach($request->photos as $photo){
            $cruise->photos()->create([
                'photo' => $photo,
            ]);
        }

        foreach ($request->feature_photos as $photo) {
            $cruise->featurePhotos()->create([
                'photo' => $photo,
            ]);
        }

        foreach ($request->iteneraries as $itenerarie) {
            $cruise->iteneraries()->create(
                $itenerarie
            );
        }


        $cruise->facilites()->sync($request->facility_id);

        foreach($request->capines as $capine){
            CruiseCapine::create([
                'cruise_id' => $cruise->id,
                'number' => $capine['number'],
                'capine_id' => $capine['type'],
                'capacity' => $capine['capacity'],
            ]);
        }

        return redirect(route('cruises.index'))->with('success',__('lang.create'));
    }


    // public function show($id)
    // {
    //     $cruise = $this->cruiseRepository->find($id);

    //     if (empty($cruise)) {
    //         Flash::error('Cruise not found');

    //         return redirect(route('cruises.index'));
    //     }

    //     return view('cruises.show')->with('cruise', $cruise);
    // }


    public function edit($id)
    {
        $cruise = Cruise::findOrFail($id)->load('photos','capines', 'iteneraries', 'featurePhotos');
        $facilites = Facilite::all();
        $capines = Capine::all();
        $cruisFacility = CruiseFacilite::where('cruise_id',$id)->pluck('facilite_id')->toArray();
        return view('AdminPanel.cruises.edit',get_defined_vars());
    }


    public function update($id, UpdateCruiseRequest $request)
    {
        $request['facility_id'] = array_diff($request->facility_id, ['all']);
        $cruise = Cruise::findOrFail($id);


        $cruise = $this->cruiseRepository->update($request->all(), $id);

        if($request->photos){
            foreach ($request->photos as $photo) {
                $cruise->photos()->create([
                    'photo' => $photo,
                ]);
            }
        }

        if ($request->feature_photos) {
            foreach ($request->feature_photos as $photo) {
                $cruise->featurePhotos()->create([
                    'photo' => $photo,
                ]);
            }
        }

        if($request->iteneraries){
            foreach ($request->iteneraries as $itenerarie) {
                $cruise->iteneraries()->updateOrCreate([
                    'id' => $itenerarie['id'],
                ],
                    $itenerarie
                );
            }
        }



        $cruise->facilites()->sync($request->facility_id);


        foreach ($request->capines as $capine) {
            CruiseCapine::updateOrCreate(
                [
                    'id' => $capine['id'],
                    'cruise_id' => $cruise->id,
                    'number' => $capine['number'],
                    'capine_id' => $capine['type']
                ]
            , [
                'cruise_id' => $cruise->id,
                'number' => $capine['number'],
                'capine_id' => $capine['type'],
                'capacity' => $capine['capacity'],
            ]);
        }


        return redirect(route('cruises.index'))->with('success',__('lang.updated'));
    }


    public function destroy($id)
    {
        $cruise = Cruise::findOrFail($id);



        $this->cruiseRepository->delete($id);


        return redirect(route('cruises.index'))->with('error',__('lang.deleted'));
    }

    public function deletePhoto($id)
    {
        CruisePhoto::findOrFail($id)->delete();
        return response([], 200);
    }

    public function deleteFeaturePhoto($id)
    {
        FeaturePhoto::findOrFail($id)->delete();
        return response([], 200);
    }

    public function deleteCapine($id){
        CruiseCapine::findOrFail($id)->delete();
        return response([], 200);
    }

    public function deleteItenerarie($id){
        CruiseItenerarie::findOrFail($id)->delete();
        return response([], 200);
    }

}
