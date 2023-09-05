<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateHelpfulFactRequest;
use App\Http\Requests\AdminPanel\UpdateHelpfulFactRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\HelpfulFact;
use App\Repositories\HelpfulFactRepository;
use Illuminate\Http\Request;
use Flash;

class HelpfulFactController extends AppBaseController
{
    private $helpfulFactRepository;

    public function __construct(HelpfulFactRepository $helpfulFactRepo)
    {
        $this->helpfulFactRepository = $helpfulFactRepo;

        $this->middleware('permission:View Helpfull Fact|Add Helpfull Fact|Edit Helpfull Fact|Delete Helpfull Fact', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Helpfull Fact', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Helpfull Fact', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Helpfull Fact', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $helpfulFacts = $this->helpfulFactRepository->all();

        return view('AdminPanel.helpful_facts.index',get_defined_vars());
    }


    public function create()
    {
        return view('AdminPanel.helpful_facts.create');
    }


    public function store(CreateHelpfulFactRequest $request)
    {
        $input = $request->all();

        $helpfulFact = $this->helpfulFactRepository->create($input);


        return redirect(route('helpful-facts.index'))->with('succes',__('lang.created'));
    }


    // public function show($id)
    // {
    //     $helpfulFact = HelpfulFact::findOrFail($id);


    //     return view('helpful_facts.show')->with('helpfulFact', $helpfulFact);
    // }


    public function edit($id)
    {
        $helpfulFact = HelpfulFact::findOrFail($id);


        return view('AdminPanel.helpful_facts.edit',get_defined_vars());
    }


    public function update($id, UpdateHelpfulFactRequest $request)
    {
        $helpfulFact = HelpfulFact::findOrFail($id);


        $helpfulFact = $this->helpfulFactRepository->update($request->all(), $id);


        return redirect(route('helpful-facts.index'))->with('succes',__('lang.updated'));
    }


    public function destroy($id)
    {
        $helpfulFact = HelpfulFact::findOrFail($id);


        $this->helpfulFactRepository->delete($id);


        return redirect(route('helpful-facts.index'))->with('error',__('lang.deleted'));
    }
}
