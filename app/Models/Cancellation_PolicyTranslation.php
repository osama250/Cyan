<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancellation_PolicyTranslation extends Model
{
    use HasFactory;
    protected $table    = 'cancellation_policy_translations';
    protected $guarded  = [];
    public $timestamps  = false;
}
