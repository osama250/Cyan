<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Facilite extends Model
{
    use Translatable,FileUploadTrait;

    public $translatedAttributes =  ['title'];
    public $table = 'facilites';

    public $fillable = [ 'title', 'icon', 'facility_type_id' ];

    protected $casts = [
        'id'   => 'integer',
        'icon' => 'string'
    ];


    static function rules()
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.title'] = 'required|string|min:3';
        }
        $rules['icon'] = 'required|string';
        return $rules;
    }

    public function activities(){
        return $this->hasMany(Activity::class, 'facility_id');
    }
}
