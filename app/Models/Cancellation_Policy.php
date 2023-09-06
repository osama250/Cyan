<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Cancellation_Policy extends Model
{
    use Translatable , FileUploadTrait;
    public $table                = 'cancellation_policies';
    public $translatedAttributes =  [ 'title','content' ];
    public $fillable             =  [ 'image' , 'title','content' ];

    protected $casts = [
        'id'        => 'integer',
        'title'     => 'string',
        'content'   => 'string',
        'iamge'     => 'string'
    ];

    public static function rules() {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.title']     = 'required|string|min:5';
            $rules[$lang . '.content']   = 'required|string|min:5';
        }
        $rules['image'] = 'required|image|mimes:jpg,jpeg,png';

        return $rules;
    }

    public function setImageAttribute($file) {
        $name = $this->upload($file,'uploads/excursion/');
        $this->attributes['image'] = $name;
    }

    public function getImageAttribute(){
        return asset('uploads/excursion/'.$this->attributes['image']);
    }


}
