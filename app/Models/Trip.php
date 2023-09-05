<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Trip extends Model
{
    use Translatable, FileUploadTrait;
    public $table = 'trips';

    public $fillable = [
        'sailling_date',
        'time',
        'arrive_date',
        'main_photo',
        'departs',
        'ports',
        'price',
        'cruise_id',
        'name',
        'description',
        'location',
        'video',
        'tag',
        'tag_color',
    ];


    public $translatedAttributes = ['name','description'];

    protected $casts = [
        'id' => 'integer',
        'sailling_date' => 'date',
        'arrive_date' => 'date',
        'main_photo' => 'string',
        'ports' => 'string',
        'price' => 'integer',
        'cruise_id' => 'integer'
    ];

    public static function rules()
    {

        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.name'] = 'required|string|min:3';
            $rules[$lang . '.description'] = 'required|string|min:3';
            $rules[$lang . '.tag'] = 'required|string|min:3';
        }
        $rules['tag_color'] = 'required|string|min:3';
        $rules['main_photo'] = 'required|image|mimes:jpg,jpeg,png';
        $rules['sailling_date'] = 'required|date';
        $rules['time'] = 'required';
        $rules['departs'] = 'required|string|min:3';
        $rules['ports'] = 'required|string|min:3';
        $rules['location'] = 'required|url';
        $rules['video'] = 'required|url';
        $rules['price'] = 'required|numeric|not_in:0|min:1';
        $rules['arrive_date'] = 'required|date|after:sailling_date';
        $rules['photos'] = 'required|array';
        $rules['photos.*'] = 'required|string';
        $rules['cruise_id'] = 'required';

        return $rules;
    }

    public function getSaillingDateAttribute()
    {
        return Carbon::parse($this->attributes['sailling_date'])->toDateString();
    }

    public function getArriveDateAttribute()
    {
        return Carbon::parse($this->attributes['arrive_date'])->toDateString();
    }

    public function getMainPhotoAttribute()
    {
        return asset('uploads/trips/' . $this->attributes['main_photo']);
    }

    public function setMainPhotoAttribute($file)
    {
        $name = $this->upload($file, 'uploads/trips/');
        $this->attributes['main_photo'] = $name;
    }

    public function photos()
    {
        return $this->hasMany(TripPhoto::class, 'trip_id');
    }

    public function cruise(){
        return $this->belongsTo(Cruise::class,'cruise_id');
    }

}