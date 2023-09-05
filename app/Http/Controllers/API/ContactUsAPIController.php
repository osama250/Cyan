<?php

namespace App\Http\Controllers\API;


use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Validator;

/**
 * Class ContactUsController
 */

class ContactUsAPIController extends AppBaseController
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            ContactUs::$rules,
        );

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],403);
        }

        $input = $request->all();

        $contactUs = ContactUs::create($input);

        return response()->json(['message' => __('lang.created')],200);
    }

}
