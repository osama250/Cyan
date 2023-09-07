<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateAccommodationRequest;
use App\Http\Requests\AdminPanel\UpdateAccommodationRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AccommodationRepository;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use Flash;

class AccommodationController extends AppBaseController
{
    /** @var AccommodationRepository $accommodationRepository*/
    private $accommodationRepository;

    public function __construct(AccommodationRepository $accommodationRepo)
    {
        $this->accommodationRepository = $accommodationRepo;
    }

    public function index(Request $request)
    {
        $accommodotions = $this->accommodationRepository->all();
        return view('AdminPanel.accommodations.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.accommodations.create');
    }

    public function store(CreateAccommodationRequest $request)
    {
        $input          = $request->all();
        $accommodotion  = $this->accommodationRepository->create( $input );
        return redirect(route('accommodations.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $accom = Accommodation::findOrFail($id);
        return view('AdminPanel.accommodations.edit' , get_defined_vars() );
    }


    public function update($id, UpdateAccommodationRequest $request)
    {
        $accom = Accommodation::findOrFail($id);
        $blog  = $this->accommodationRepository->update( $request->all() , $id );
        return redirect(route('accommodations.index'))->with('success',__('lang.updated'));
    }

    public function destroy($id)
    {
        $accom = Accommodation::findOrFail($id);
        $this->accommodationRepository->delete($id);
        return redirect(route('accommodations.index'))->with( 'error',__('lang.deleted') );
    }
}
