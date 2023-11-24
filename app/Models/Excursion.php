<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Excursion extends Model
{
    use Translatable ,FileUploadTrait;

    public $table    = 'excursions';
    public $fillable = [ 'title', 'description', 'location',  'image' ];

    protected $casts = [
        'id'        => 'integer',
        'title'     => 'string',
        'location'  => 'string',
        'image'     => 'string'
    ];

    public $translatedAttributes = ['title','description'];

    public static function rules(){
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.title'] = 'required|string|min:5';
            $rules[$lang . '.description'] = 'required|string|min:5';
        }
        $rules['location'] = 'required|url';
        $rules['image'] = 'required|image|mimes:jpg,jpeg,png';
        return $rules;
    }

    public function setImageAttribute($file){
        $name = $this->upload($file,'uploads/excursion/');
        $this->attributes['image'] = $name;
    }

    public function getImageAttribute(){
        return asset('uploads/excursion/'.$this->attributes['image']);
    }


}
