<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function lieu(){
        return $this->belongsTo('App\Lieu');
    }
    public function voiture(){
        return $this->belongsTo('App\Voiture');
    }
}
