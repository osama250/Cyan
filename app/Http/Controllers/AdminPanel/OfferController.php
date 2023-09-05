<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateOfferRequest;
use App\Http\Requests\AdminPanel\UpdateOfferRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Offer;
use App\Models\Trip;
use App\Repositories\OfferRepository;
use Illuminate\Http\Request;
use Flash;

class OfferController extends AppBaseController
{
    /** @var OfferRepository $offerRepository*/
    private $offerRepository;

    public function __construct(OfferRepository $offerRepo)
    {
        $this->offerRepository = $offerRepo;

        $this->middleware('permission:View Offer|Add Offer|Edit Offer|Delete Offer', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Offer', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Offer', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Offer', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $offers = $this->offerRepository->all();

        return view('AdminPanel.offers.index',get_defined_vars());
    }

    public function create()
    {
        $trips = Trip::all();
        return view('AdminPanel.offers.create',get_defined_vars());
    }


    public function store(CreateOfferRequest $request)
    {
        $input = $request->all();

        $offer = $this->offerRepository->create($input);

        return redirect(route('offers.index'))->with('success',__('lang.created'));
    }


    // public function show($id)
    // {
    //     $offer = $this->offerRepository->find($id);

    //     if (empty($offer)) {
    //         Flash::error('Offer not found');

    //         return redirect(route('offers.index'));
    //     }

    //     return view('offers.show')->with('offer', $offer);
    // }

    public function edit($id)
    {
        $trips = Trip::all();
        $offer = Offer::findOrFail($id);

        return view('AdminPanel.offers.edit',get_defined_vars());
    }


    public function update($id, UpdateOfferRequest $request)
    {
        $offer = Offer::findOrFail($id);



        $offer = $this->offerRepository->update($request->all(), $id);


        return redirect(route('offers.index'))->with('success',__('lang.updated'));
    }


    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);

        $this->offerRepository->delete($id);


        return redirect(route('offers.index'))->with('error',__('lang.deleted'));
    }
}
