<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateCapineRequest;
use App\Http\Requests\AdminPanel\UpdateCapineRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Capine;
use App\Repositories\CapineRepository;
use Illuminate\Http\Request;
use Flash;

class CapineController extends AppBaseController
{
    private $capineRepository;

    public function __construct(CapineRepository $capineRepo)
    {
        $this->capineRepository = $capineRepo;

        $this->middleware('permission:View Capine|Add Capine|Edit Capine|Delete Capine', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Capine', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Capine', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Capine', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $capines = $this->capineRepository->all();

        return view('AdminPanel.capines.index',get_defined_vars());
    }


    public function create()
    {
        return view('AdminPanel.capines.create');
    }


    public function store(CreateCapineRequest $request)
    {
        $input = $request->all();

        $capine = $this->capineRepository->create($input);

        return redirect(route('capines.index'))->with('success',__('lang.created'));
    }


    // public function show($id)
    // {
    //     $capine = $this->capineRepository->find($id);

    //     if (empty($capine)) {
    //         Flash::error('Capine not found');

    //         return redirect(route('capines.index'));
    //     }

    //     return view('capines.show')->with('capine', $capine);
    // }


    public function edit($id)
    {
        $capine = Capine::findOrFail($id);


        return view('AdminPanel.capines.edit',get_defined_vars());
    }


    public function update($id, UpdateCapineRequest $request)
    {
        $capine = Capine::findOrFail($id);



        $capine = $this->capineRepository->update($request->all(), $id);


        return redirect(route('capines.index'))->with('success',__('lang.updated'));
    }


    public function destroy($id)
    {
        $capine = Capine::findOrFail($id);



        $this->capineRepository->delete($id);


        return redirect(route('capines.index'))->with('error',__('lang.deleted'));
    }
}
