<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use FileUploadTrait,Translatable;
    public $table = 'sliders';

    public $fillable = [
        'media','type'
    ];

    protected $casts = [
        'id' => 'integer'
    ];

    public $translatedAttributes =  ['title','sub_title'];

    public static array $rules = [
        'media' => 'required|file|mimes:jpg,png,mp4,jpeg,avi'
    ];

    public function getMediaAttribute(){
        return asset('uploads/slider/'.$this->attributes['media']);
    }

    public function setMediaAttribute($value){
        $name = $this->upload($value,'uploads/slider/');
        $this->attributes['media'] = $name;

    }

}