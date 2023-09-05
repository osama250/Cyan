<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogs(){
        return response()->json(['blogs'=> Blog::all()],200);
    }
    public function blog($id)
    {
        return response()->json(['blog' => Blog::findOrFail($id)], 200);
    }
}
