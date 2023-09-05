<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateFaciliteRequest;
use App\Http\Requests\AdminPanel\UpdateFaciliteRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Facilite;
use App\Models\FacilitePhoto;
use App\Models\FacilityType;
use App\Repositories\FaciliteRepository;
use Illuminate\Http\Request;

class FaciliteController extends AppBaseController
{
    private $faciliteRepository;

    public function __construct(FaciliteRepository $faciliteRepo)
    {
        $this->faciliteRepository = $faciliteRepo;

        $this->middleware('permission:View Facilite|Add Facilite|Edit Facilite|Delete Facilite', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Facilite', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Facilite', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Facilite', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Facilite.
     */
    public function index(Request $request)
    {
        $facilites = $this->faciliteRepository->all();

        return view('AdminPanel.facilites.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new Facilite.
     */
    public function create()
    {
        return view('AdminPanel.facilites.create',get_defined_vars());
    }

    /**
     * Store a newly created Facilite in storage.
     */
    public function store(CreateFaciliteRequest $request)
    {
        $input = $request->all();

        $facilite = $this->faciliteRepository->create($input);


        return redirect(route('facilites.index'))->with('success',__('lang.created'));
    }

    /**
     * Display the specified Facilite.
     */
    // public function show($id)
    // {
    //     $facilite = $this->faciliteRepository->find($id);

    //     if (empty($facilite)) {
    //         Flash::error('Facilite not found');

    //         return redirect(route('facilites.index'));
    //     }

    //     return view('facilites.show')->with('facilite', $facilite);
    // }

    /**
     * Show the form for editing the specified Facilite.
     */
    public function edit($id)
    {
        $facilite = Facilite::findOrFail($id);


        return view('AdminPanel.facilites.edit',get_defined_vars());
    }

    /**
     * Update the specified Facilite in storage.
     */

    public function update($id, UpdateFaciliteRequest $request)
    {
        $facilite = Facilite::findOrFail($id);

        $facilite = $this->faciliteRepository->update($request->all(), $id);



        return redirect(route('facilites.index'))->with('success',__('lang.updated'));
    }

    /**
     * Remove the specified Facilite from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $facilite = Facilite::findOrFail($id);

        $this->faciliteRepository->delete($id);


        return redirect(route('facilites.index'))->with('warning',__('lang.deleted'));
    }

}