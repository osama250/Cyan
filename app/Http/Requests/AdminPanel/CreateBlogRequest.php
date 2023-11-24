<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Blog;
use Illuminate\Foundation\Http\FormRequest;

class CreateBlogRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Blog::rules();
    }
}
