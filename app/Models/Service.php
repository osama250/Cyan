<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class Service extends Model
{
    use Translatable , FileUploadTrait;
    public $table    = 'services';
    public $translatedAttributes  =  [ 'title', 'text' ];
    public $fillable              = ['image' , 'title' , 'text' ];

    protected $casts = [
        'id'     => 'integer',
        'image'  => 'string'
    ];

    public static function rules()
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.title'] = 'required|string|min:5';
            $rules[$lang . '.text']  = 'required|string|min:5';
        }
        $rules['image'] = 'required|image|mimes:jpg,jpeg,png';
        return $rules;
    }


}
