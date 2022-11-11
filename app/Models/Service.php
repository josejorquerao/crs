<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table="service";
    public function details(){
        return $this->belongsToMany('App\Models\Detail');
    }
}
