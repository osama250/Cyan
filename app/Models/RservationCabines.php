<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\cabines;
use App\Models\Cruise;
use App\Models\Reservation;


class RservationCabines extends Model
{
    use HasFactory , SoftDeletes;
    public $table    = 'rservation_cabines';
    protected $dates = ['deleted_at'];
    public $fillable = ['reservation_id','capine_id', 'cruise_id' , 'capacity', 'type', 'price', 'adults_count'];

        public function cabines() {
            return $this->belongsTo( cabines::class , 'capine_id');
        }

        public function cruise() {
            return $this->belongsTo( Cruise::class , 'cruise_id');
        }

        public function reservation() {
            return $this->belongsTo( Reservation::class );
        }
}
