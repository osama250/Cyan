<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateAgeRequest;
use App\Http\Requests\AdminPanel\UpdateAgeRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Age;
use App\Repositories\AgeRepository;
use Illuminate\Http\Request;
use Flash;

class AgeController extends AppBaseController
{
    /** @var AgeRepository $ageRepository*/
    private $ageRepository;

    public function __construct(AgeRepository $ageRepo)
    {
        $this->ageRepository = $ageRepo;

        $this->middleware('permission:View Age|Add Age|Edit Age|Delete Age', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Age', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Age', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Age', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Age.
     */
    public function index(Request $request)
    {
        $ages = $this->ageRepository->all();

        return view('AdminPanel.ages.index',get_defined_vars());
    }


    public function create()
    {
        return view('AdminPanel.ages.create');
    }


    public function store(CreateAgeRequest $request)
    {
        $input = $request->all();

        $age = $this->ageRepository->create($input);


        return redirect(route('ages.index'))->with('success',__('lang.created'));
    }


    // public function show($id)
    // {
    //     $age = Age::findOrFail($id);

    //     return view('ages.show')->with('age', $age);
    // }

    public function edit($id)
    {
        $age = Age::findOrFail($id);


        return view('AdminPanel.ages.edit',get_defined_vars());
    }


    public function update($id, UpdateAgeRequest $request)
    {
        $age = Age::findOrFail($id);


        $age = $this->ageRepository->update($request->all(), $id);


        return redirect(route('ages.index'))->with('success',__('lang.updated'));
    }


    public function destroy($id)
    {
        $age = Age::findOrFail($id);



        $this->ageRepository->delete($id);


        return redirect(route('ages.index'))->with('error',__('lang.deleted'));
    }
}
