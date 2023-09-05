<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateExcursionRequest;
use App\Http\Requests\AdminPanel\UpdateExcursionRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Excursion;
use App\Repositories\ExcursionRepository;
use Illuminate\Http\Request;
use Flash;

class ExcursionController extends AppBaseController
{
    /** @var ExcursionRepository $excursionRepository*/
    private $excursionRepository;

    public function __construct(ExcursionRepository $excursionRepo)
    {
        $this->excursionRepository = $excursionRepo;
        $this->middleware('permission:View Excursion|Add Excursion|Edit Excursion|Delete Excursion', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Excursion', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Excursion', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Excursion', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Excursion.
     */
    public function index(Request $request)
    {
        $excursions = $this->excursionRepository->all();

        return view('AdminPanel.excursions.index',get_defined_vars());
    }


    public function create()
    {
        return view('AdminPanel.excursions.create');
    }


    public function store(CreateExcursionRequest $request)
    {
        $input = $request->all();

        $excursion = $this->excursionRepository->create($input);


        return redirect(route('excursions.index'))->with('success',__('lang.created'));
    }


    // public function show($id)
    // {
    //     $excursion = $this->excursionRepository->find($id);

    //     if (empty($excursion)) {
    //         Flash::error('Excursion not found');

    //         return redirect(route('excursions.index'));
    //     }

    //     return view('excursions.show')->with('excursion', $excursion);
    // }


    public function edit($id)
    {
        $excursion = Excursion::findOrFail($id);

        return view('AdminPanel.excursions.edit',get_defined_vars());
    }


    public function update($id, UpdateExcursionRequest $request)
    {
        $excursion = Excursion::findOrFail($id);



        $excursion = $this->excursionRepository->update($request->all(), $id);


        return redirect(route('excursions.index'))->with('success',__('lang.updated'));
    }


    public function destroy($id)
    {
        $excursion = Excursion::findOrFail($id);


        $this->excursionRepository->delete($id);


        return redirect(route('excursions.index'))->with('error',__('lang.deleted'));
    }
}
