<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class ChooseUs extends Model
{
    use Translatable;
    public $table                = 'choices';
    public $translatedAttributes =  [ 'title','text' ];
    public $fillable             =  [ 'icon','title', 'text' ];

    protected $casts = [
        'id'    => 'integer',
        'icon'  => 'string',
        'title' => 'string',
        'text'  => 'string'
    ];

    public static function rules() {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.title']    = 'required|string|min:5';
            $rules[$lang . '.text']     = 'required|string|min:5';
        }
            $rules['icon']              = 'required|string|min:5';

        return $rules;
    }

}
