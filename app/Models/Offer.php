<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public $table = 'offers';

    public $fillable = [
        'trip_id',
        'start_date',
        'end_date',
        'value',
        'type'
    ];

    protected $casts = [
        'id' => 'integer',
        'trip_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'value' => 'integer',
        'type' => 'string'
    ];

    protected $appends = ['typestring'];

    public static array $rules = [
        'trip_id' => 'required|numeric|exists:trips,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'value' => 'required|numeric|min:1|not_in:0',
        'type' => 'required|in:0,1'
    ];

    public function getStartDateAttribute(){
        return Carbon::parse($this->attributes['start_date'])->toDateString();
    }

    public function getEndDateAttribute()
    {
        return Carbon::parse($this->attributes['end_date'])->toDateString();
    }

    public function getTypestringAttribute() {
        return $this->attributes['type'] == 1 ? 'amount' : 'percentage';
    }

    public function trip() {
        return $this->belongsTo(Trip::class,'trip_id');
    }

}
