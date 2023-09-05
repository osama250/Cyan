<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CruiseTranslation extends Model
{
    use HasFactory;

    public $fillable = ['info','dinning','features'];
}