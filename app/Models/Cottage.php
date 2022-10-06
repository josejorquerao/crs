<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cottage extends Model
{
    use HasFactory;
    protected $table="cottage";

    //relacion uno a muchos
    public function details(){
        return $this->hasMany('App\Models\Detail');
    }
}
