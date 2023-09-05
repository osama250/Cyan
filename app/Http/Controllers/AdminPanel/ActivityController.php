<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateActivityRequest;
use App\Http\Requests\AdminPanel\UpdateActivityRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Activity;
use App\Models\Facilite;
use App\Repositories\ActivityRepository;
use Illuminate\Http\Request;
use Flash;

class ActivityController extends AppBaseController
{
    /** @var ActivityRepository $activityRepository*/
    private $activityRepository;

    public function __construct(ActivityRepository $activityRepo)
    {
        $this->activityRepository = $activityRepo;

        $this->middleware('permission:View Activity|Add Activity|Edit Activity|Delete Activity', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Activity', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Activity', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Activity', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Activity.
     */
    public function index(Request $request)
    {
        $activities = $this->activityRepository->all();

        return view('AdminPanel.activities.index',get_defined_vars());
    }


    public function create()
    {
        $facilities = Facilite::all();
        return view('AdminPanel.activities.create',get_defined_vars());
    }


    public function store(CreateActivityRequest $request)
    {
        $input = $request->all();

        $activity = $this->activityRepository->create($input);


        return redirect(route('activities.index'))->with('success',__('lang.created'));
    }


    // public function show($id)
    // {
    //     $activity = $this->activityRepository->find($id);

    //     if (empty($activity)) {
    //         Flash::error('Activity not found');

    //         return redirect(route('activities.index'));
    //     }

    //     return view('activities.show')->with('activity', $activity);
    // }

   public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        $facilities = Facilite::all();

        return view('AdminPanel.activities.edit',get_defined_vars());
    }


    public function update($id, UpdateActivityRequest $request)
    {
        $activity = Activity::findOrFail($id);


        $activity = $this->activityRepository->update($request->all(), $id);


        return redirect(route('activities.index'))->with('success',__('lang.updated'));
    }


    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);



        $this->activityRepository->delete($id);


        return redirect(route('activities.index'))->with('error',__('lang.deleted'));
    }
}
