<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    public $table = 'ages';

    public $fillable = [
        'from',
        'to',
        'type',
        'value',
    ];

    protected $casts = [
        'id' => 'integer',
        'from' => 'integer',
        'to' => 'integer',
        'type' => 'string',
        'value' => 'integer',
    ];

    public $appends = ['typestring'];

    public static array $rules = [
        'from' => 'required|numeric|not_in:0|min:1',
        'to' => 'required|numeric|not_in:0|min:1|gt:from',
        'type' => 'required|in:0,1',
        'value' => 'required|numeric|not_in:0'
    ];

    public function getTypestringAttribute()
    {
        return $this->attributes['type'] == 1 ? 'amount' : 'percentage';
    }

}