<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripPhoto extends Model
{
    use HasFactory;
    public $fillable = ['photo','trip_id'];

    
    public function getPhotoAttribute(){
        return asset('uploads/trips/' . $this->attributes['photo']);
    }
}
