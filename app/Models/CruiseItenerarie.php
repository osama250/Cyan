<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CruiseItenerarie extends Model
{
    use HasFactory , Translatable;
    protected $fillable = ['cruise_id','name'];
    protected $translatedAttributes = ['name'];
}