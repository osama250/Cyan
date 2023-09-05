<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $fillable=['icon','link'];

    static function rules(){
        $rules['icon'] = 'required|string';
        $rules['link'] = 'required|string';
        $rules['id'] = 'sometimes|exists:social_media,id';

        return $rules;
    }
}