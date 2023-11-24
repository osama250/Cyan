<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Cruise extends Model
{
    use Translatable , FileUploadTrait;
    public $table = 'cruises';
    public $fillable = [
        'name',
        'main_photo',
        'location',
        'media_link',
        'info',
        'dinning',
        'features',
        'avg_rate',
    ];

    protected $casts = [
        'id'            => 'integer',
        'name'          => 'string',
        'main_photo'    => 'string',
        'location'      => 'string',
        'media_link'    => 'string'
    ];

    public $translatedAttributes = ['info','dinning','features'];

    public static function rules(){

        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang.'.info'] = 'required|string|min:3';
            $rules[$lang . '.dinning'] = 'required|string|min:3';
            $rules[$lang . '.features'] = 'required|string|min:3';
            $rules['iteneraries.*.'.$lang . '.name'] = 'required|string|min:3';
        }

        $rules['name'] = 'required|string|min:3';
        $rules['main_photo'] = 'required|image|mimes:jpg,jpeg,png';
        $rules['location'] = 'required|url';
        $rules['media_link'] = 'required|url';
        $rules['photos'] = 'required|array';
        $rules['photos.*'] = 'required|string';
        $rules['feature_photos'] = 'required|array';
        $rules['feature_photos.*'] = 'required|string';
        $rules['facility_id'] = 'required|array';
        $rules['facility_id.*'] = 'required';
        $rules['capines'] = 'required|array';
        $rules['capines.*.number'] = 'required|numeric|min:0';
        $rules['capines.*.type'] = 'required|exists:capines,id';
        $rules['capines.*.capacity'] = 'required|numeric|min:1|not_in:0';
        return $rules;
    }

    public function getMainPhotoAttribute()
    {
        return asset('uploads/cruises/' . $this->attributes['main_photo']);
    }

    public function setMainPhotoAttribute($file)
    {
        $name = $this->upload($file, 'uploads/cruises/');
        $this->attributes['main_photo'] = $name;
    }

    public function photos() {
        return $this->hasMany(CruisePhoto::class,'cruise_id');
    }

    public function featurePhotos()
    {
        return $this->hasMany(FeaturePhoto::class, 'cruise_id');
    }

    public function facilites() {   // many to many
        return $this->belongsToMany(Facilite::class,'cruise_facilites','cruise_id','facilite_id');
    }

    public function capines()  // Many to Many
    {
        return $this->belongsToMany( Capine::class,'cruise_capines', 'cruise_id', 'capine_id')->withPivot('number','id','capacity');
    }

    public function trips()   // one to Many
    {
        return $this->hasMany(Trip::class, 'cruise_id');
    }

    public function iteneraries(){    // one to many
        return $this->hasMany(CruiseItenerarie::class,'cruise_id');
    }

    public function reviews(){
        return $this->hasMany(CruiseReview::class,'cruise_id');
    }

}
