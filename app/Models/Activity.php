<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Activity extends Model
{
    use Translatable;
    public $table    = 'activities';
    public $fillable = [ 'facility_id' ];

    protected $casts = [
        'id'             => 'integer',
        'facility_id'    => 'integer'
    ];

    protected $translatedAttributes = ['title'];

    public static function rules(){
        $rules['facility_id']  = 'required|exists:facilites,id';
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.title'] = 'required|string|min:2';
        }
        return $rules;
    }

    public function facility(){
        return $this->belongsTo(Facilite::class,'facility_id');
    }

}
