<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Term extends Model
{
    use Translatable;
    public $table = 'terms';
    public $translatedAttributes =  ['title', 'description', 'seo', 'keywords', 'focus_keyword'];
    protected $fillable          = ['title', 'description', 'seo', 'keywords', 'focus_keyword'];


    public static function rules()
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.title'] = 'required|string|min:5';
            $rules[$lang . '.description'] = 'required|string|min:5';
            $rules[$lang . '.seo'] = 'required|string|min:5';
            $rules[$lang . '.keywords'] = 'required|string|min:5';
            $rules[$lang . '.focus_keyword'] = 'required|string|min:5';
        }
        return $rules;
    }


}
