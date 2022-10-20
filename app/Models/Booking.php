<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    public function detail(){
           return $this->hasOne('App\Models\Detail');
    }
    public function user(){
        return $this->hasMany('App\Models\User');
    }
    public function guest(){
        return $this->hasOne('App\Models\Guest');
    }
    
}
