<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Blog extends Model
{
    use Translatable ,FileUploadTrait;
    public $table = 'blogs';

    public $translatedAttributes =  ['title','brief' ,'description', 'seo', 'keywords', 'focus_keyword'];

    public $fillable = [
        'photo', 'title', 'brief', 'description', 'seo', 'keywords', 'focus_keyword',
    ];

    protected $casts = [
        'id' => 'integer',
        'photo' => 'string',
        'title' => 'string',
        'brief' => 'string',
        'description' => 'string',
        'seo' => 'string',
        'keywords' => 'string',
        'focus_keyword' => 'string',
    ];

    public static function  rules(){
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.title'] = 'required|string|min:5';
            $rules[$lang . '.brief'] = 'required|string|min:5';
            $rules[$lang . '.description'] = 'required|string|min:5';
            $rules[$lang . '.seo'] = 'required|string|min:5';
            $rules[$lang . '.keywords'] = 'required|string|min:5';
            $rules[$lang . '.focus_keyword'] = 'required|string|min:5';
        }
        $rules['photo'] = 'required|image|mimes:jpg,jpeg,png';
        return $rules;
    }

    public function getPhotoAttribute(){
        return asset('uploads/blogs/'.$this->attributes['photo']);
    }

    public function setPhotoAttribute($file)
    {
        $name = $this->upload($file,'uploads/blogs/');
        $this->attributes['photo'] = $name;
    }
}