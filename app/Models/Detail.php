<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    // Muchos a muchos
    use HasFactory;
    public function services(){
        return $this->belongsToMany('App\Models\Service');
    }

    // Uno a muchos (inversa)
    public function cottage(){
        return $this->belongsTo('App\Models\Cottage');
    }
    
    // Uno a uno Inversa
    public function reserve(){
        return $this->belongsTo('App\Models\Reserve');
    }
}
