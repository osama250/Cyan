<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Trip;
use App\Models\User;
use PhpParser\Node\Expr\FuncCall;
use App\Models\RservationCabines;
use App\Models\RservationAdon;

class Reservation extends Model
{
    use HasFactory , SoftDeletes;
    public $table    = 'reservations';
    protected $dates = [ 'deleted_at' ];
    public $fillable = [ 'trip_id',  'user_id',  'price', 'comment', 'uuid', ];

    public function trip() {
        return $this->belongsTo( Trip::class , 'trip_id' );
    }

    public function user() {
        return $this->belongsTo( User::class , 'user_id' );
    }

    public function rdervedCabines() {
        return $this->hasMany( RservationCabines::class );
    }
    public function rservationAdon() {
        return $this->hasMany( RservationAdon::class );
    }

}
