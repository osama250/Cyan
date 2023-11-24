<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Reservation;

class RservationAdon extends Model
{
    use HasFactory , SoftDeletes;
    public $table    = 'rservation_cabines';
    protected $dates = [ 'deleted_at' ];
    public $fillable = [ 'reservation_id', 'type', 'price', 'adults_count' ];

    public function reservation() {
        return $this->belongsTo( Reservation::class );
    }

}
