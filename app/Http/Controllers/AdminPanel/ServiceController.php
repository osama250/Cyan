<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateServiceRequest;
use App\Http\Requests\AdminPanel\UpdateServiceRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Service;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use Flash;

class ServiceController extends AppBaseController
{
    /** @var ServiceRepository $serviceRepository*/
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepo)
    {
        $this->serviceRepository = $serviceRepo;
    }


    public function index(Request $request)
    {
        $services = $this->serviceRepository->all();
        return view( 'AdminPanel.services.index', get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.services.create');
    }

    public function store(CreateServiceRequest $request)
    {
        $input   = $request->all();
        $service = $this->serviceRepository->create($input);
        return redirect(route('services.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('AdminPanel.services.edit' , get_defined_vars() );
    }

    public function update($id, UpdateServiceRequest $request)
    {
        $service = Service::findOrFail($id);
        $service  = $this->serviceRepository->update($request->all(), $id);
        return redirect(route('services.index'))->with('success',__('lang.updated'));
    }

    public function destroy($id)
    {
        $cancel = Service::findOrFail($id);
        $this->serviceRepository->delete($id);
        return redirect(route('services.index'))->with('error',__('lang.deleted'));
    }
}
