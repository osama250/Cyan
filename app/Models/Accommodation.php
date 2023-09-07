<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Accommodation extends Model
{
    use Translatable , FileUploadTrait;
    public $table                 = 'accommodations';
    public $translatedAttributes  =  [ 'title', 'text' ];
    public $fillable              = [ 'image' , 'title' , 'text' ];

    protected $casts = [
        'id'    => 'integer',
        'image' => 'string'
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

    public function setImageAttribute($file) {
        $name = $this->upload($file,'uploads/excursion/');
        $this->attributes['image'] = $name;
    }

    public function getImageAttribute() {
        return asset('uploads/excursion/'.$this->attributes['image']);
    }

}
