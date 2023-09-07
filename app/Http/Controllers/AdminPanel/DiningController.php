<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateDiningRequest;
use App\Http\Requests\AdminPanel\UpdateDiningRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\DiningRepository;
use Illuminate\Http\Request;
use App\Models\Dining;
use Flash;

class DiningController extends AppBaseController
{
    /** @var DiningRepository $diningRepository*/
    private $diningRepository;

    public function __construct(DiningRepository $diningRepo)
    {
        $this->diningRepository = $diningRepo;
        $this->middleware('permission:View Dining|Add Dining|Edit Dining|Delete Dining', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Dining', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Dining', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Dining', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $dinings = $this->diningRepository->all();
        return view('AdminPanel.dinings.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.dinings.create');
    }

    public function store(CreateDiningRequest $request)
    {
        $input  = $request->all();
        $dining = $this->diningRepository->create( $input );
        return redirect(route('dinings.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $dining = Dining::findOrFail($id);
        return view('AdminPanel.dinings.edit' , get_defined_vars() );
    }

    public function update($id, UpdateDiningRequest $request)
    {
        $dinig = Dining::findOrFail($id);
        $blog  = $this->diningRepository->update( $request->all(), $id );
        return redirect(route('dinings.index'))->with('success',__('lang.updated'));
    }

    public function destroy($id)
    {
        $dining = Dining::findOrFail($id);
        $this->diningRepository->delete($id);
        return redirect(route('dinings.index'))->with( 'error',__('lang.deleted') );
    }
}
