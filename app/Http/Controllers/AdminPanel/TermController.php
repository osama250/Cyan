<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateTermRequest;
use App\Http\Requests\AdminPanel\UpdateTermRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Term;
use App\Repositories\TermRepository;
use Illuminate\Http\Request;
use Flash;

class TermController extends AppBaseController
{
    /** @var TermRepository $termRepository*/
    private $termRepository;

    public function __construct(TermRepository $termRepo)
    {
        $this->termRepository = $termRepo;

        $this->middleware('permission:View Term|Add Term|Edit Term|Delete Term', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Term', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Term', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Term', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $terms = $this->termRepository->all();

        return view('AdminPanel.terms.index',get_defined_vars());
    }


    // public function create()
    // {
    //     return view('terms.create');
    // }


    // public function store(CreateTermRequest $request)
    // {
    //     $input = $request->all();

    //     $term = $this->termRepository->create($input);

    //     Flash::success('Term saved successfully.');

    //     return redirect(route('terms.index'));
    // }

    // /**
    //  * Display the specified Term.
    //  */
    // public function show($id)
    // {
    //     $term = $this->termRepository->find($id);

    //     if (empty($term)) {
    //         Flash::error('Term not found');

    //         return redirect(route('terms.index'));
    //     }

    //     return view('terms.show')->with('term', $term);
    // }

    public function edit($id)
    {
        $term = Term::findOrFail($id);

        return view('AdminPanel.terms.edit',get_defined_vars());
    }

    public function update($id, UpdateTermRequest $request)
    {
        $term = Term::findOrFail($id);

        $term = $this->termRepository->update($request->all(), $id);


        return redirect(route('terms.index'))->with('success',__('lang.updated'));
    }


    // public function destroy($id)
    // {
    //     $term = $this->termRepository->find($id);

    //     if (empty($term)) {
    //         Flash::error('Term not found');

    //         return redirect(route('terms.index'));
    //     }

    //     $this->termRepository->delete($id);

    //     Flash::success('Term deleted successfully.');

    //     return redirect(route('terms.index'));
    // }
}