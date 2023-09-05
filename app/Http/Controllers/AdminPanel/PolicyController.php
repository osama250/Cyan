<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreatePolicyRequest;
use App\Http\Requests\AdminPanel\UpdatePolicyRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Policy;
use App\Repositories\PolicyRepository;
use Illuminate\Http\Request;
use Flash;

class PolicyController extends AppBaseController
{
    /** @var PolicyRepository $policyRepository*/
    private $policyRepository;

    public function __construct(PolicyRepository $policyRepo)
    {
        $this->policyRepository = $policyRepo;

        $this->middleware('permission:View Policy|Add Policy|Edit Policy|Delete Policy', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Policy', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Policy', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Policy', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Policy.
     */
    public function index(Request $request)
    {
        $policies = $this->policyRepository->all();

        return view('AdminPanel.policies.index',get_defined_vars());
    }


    // public function create()
    // {
    //     return view('policies.create');
    // }


    // public function store(CreatePolicyRequest $request)
    // {
    //     $input = $request->all();

    //     $policy = $this->policyRepository->create($input);

    //     Flash::success('Policy saved successfully.');

    //     return redirect(route('policies.index'));
    // }


    // public function show($id)
    // {
    //     $policy = $this->policyRepository->find($id);

    //     if (empty($policy)) {
    //         Flash::error('Policy not found');

    //         return redirect(route('policies.index'));
    //     }

    //     return view('policies.show')->with('policy', $policy);
    // }

   public function edit($id)
    {
        $policy = Policy::findOrFail($id);

        return view('AdminPanel.policies.edit',get_defined_vars());
    }


    public function update($id, UpdatePolicyRequest $request)
    {
        $policy = Policy::findOrFail($id);

        $policy = $this->policyRepository->update($request->all(), $id);


        return redirect(route('policies.index'))->with('success',__('lang.updated'));
    }


    // public function destroy($id)
    // {
    //     $policy = $this->policyRepository->find($id);

    //     if (empty($policy)) {
    //         Flash::error('Policy not found');

    //         return redirect(route('policies.index'));
    //     }

    //     $this->policyRepository->delete($id);

    //     Flash::success('Policy deleted successfully.');

    //     return redirect(route('policies.index'));
    // }
}