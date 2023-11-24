<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Blog;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = Blog::rules();
        $rules['photo'] = 'nullable|image|mimes:png,jpg,jpeg';

        return $rules;
    }
}
