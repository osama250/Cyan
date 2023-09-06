<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateCancellation_PolicyRequest;
use App\Http\Requests\AdminPanel\UpdateCancellation_PolicyRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Cancellation_PolicyRepository;
use Illuminate\Http\Request;
use App\Models\Cancellation_Policy;
use Flash;

class Cancellation_PolicyController extends AppBaseController
{

    private $cancellationPolicyRepository;

    public function __construct(Cancellation_PolicyRepository $cancellationPolicyRepo)
    {
        $this->cancellationPolicyRepository = $cancellationPolicyRepo;

        $this->middleware('permission:View Cancellation_Policy|Add Cancellation_Policy|Edit Cancellation_Policy|Delete Cancellation_Policy', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Cancellation_Policy', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Cancellation_Policy', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Cancellation_Policy', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $cancellationPolicies = $this->cancellationPolicyRepository->all();
        return view('AdminPanel.cancellation__policies.index', get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.cancellation__policies.create');
    }

    public function store( CreateCancellation_PolicyRequest $request)
    {
        $input = $request->all();
        $blog  = $this->cancellationPolicyRepository->create($input);
        return redirect(route('cancellation_-policies.index'))->with('success',__('lang.created'));
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $cancel = Cancellation_Policy::findOrFail($id);
        return view('AdminPanel.cancellation__policies.edit' , get_defined_vars() );
    }

    public function update($id, UpdateCancellation_PolicyRequest $request)
    {
        $cancel = Cancellation_Policy::findOrFail($id);
        $blog = $this->cancellationPolicyRepository->update($request->all(), $id);
        return redirect(route('cancellation_-policies.index'))->with('success',__('lang.updated'));
    }


    public function destroy($id)
    {
        $cancel = Cancellation_Policy::findOrFail($id);
        $this->cancellationPolicyRepository->delete($id);
        return redirect(route('cancellation_-policies.index'))->with('error',__('lang.deleted'));
    }
}
