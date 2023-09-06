<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Capine extends Model
{
    use Translatable;
    public $table = 'capines';

    public $fillable = [
        'type',
];

    protected $casts = [
        'id'    => 'integer',
        'type'  => 'string'
    ];

    protected $translatedAttributes = ['type'];

    public static function rules() {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.type'] = 'required|string|min:2';
        }
        return $rules;
    }


}
