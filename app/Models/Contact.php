<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $table    = 'contacts';
    public $fillable = [ 'icon', 'value' ];

    protected $casts = [
        'id'     => 'integer',
        'icon'   => 'string',
        'value'  => 'string'
    ];

    public static array $rules = [
        'icon'  => 'required|string',
        'value' => 'required|string'
    ];


}
