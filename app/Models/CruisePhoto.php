<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CruisePhoto extends Model
{
    use HasFactory;

    protected $fillable = ['cruise_id','photo'];

    public function getPhotoAttribute()
    {
        return asset('uploads/cruises/' . $this->attributes['photo']);
    }
}