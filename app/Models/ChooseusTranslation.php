<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChooseusTranslation extends Model
{
    use HasFactory;
    protected $table    = 'chooseus_translations';
    protected $guarded  = [];
    public $timestamps  = false;
}
