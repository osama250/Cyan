<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateChooseUsRequest;
use App\Http\Requests\AdminPanel\UpdateChooseUsRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ChooseUsRepository;
use Illuminate\Http\Request;
use App\Models\ChooseUs;
use Flash;

class ChooseUsController extends AppBaseController
{
    /** @var ChooseUsRepository $chooseUsRepository*/
    private $chooseUsRepository;

    public function __construct(ChooseUsRepository $chooseUsRepo)
    {
        $this->chooseUsRepository = $chooseUsRepo;
    }


    public function index(Request $request)
    {
        $chooses = $this->chooseUsRepository->all();
        return view('AdminPanel.chooseuses.index', get_defined_vars() );
    }


    public function create()
    {
        return view('AdminPanel.chooseuses.create');
    }


    public function store(CreateChooseUsRequest $request)
    {
        $input = $request->all();
        $blog  = $this->chooseUsRepository->create($input);
        return redirect(route('chooseuses.index'))->with('success',__('lang.created'));
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $choose = ChooseUs::findOrFail($id);
        return view('AdminPanel.chooseuses.edit' , get_defined_vars() );
    }


    public function update($id, UpdateChooseUsRequest $request)
    {
        $choose = ChooseUs::findOrFail($id);
        $choose = $this->chooseUsRepository->update($request->all(), $id);
        return redirect(route('chooseuses.index'))->with('success',__('lang.updated'));
    }


    public function destroy($id)
    {
        $cancel = ChooseUs::findOrFail($id);
        $this->chooseUsRepository->delete($id);
        return redirect(route('chooseuses.index'))->with('error',__('lang.deleted'));
    }
}
