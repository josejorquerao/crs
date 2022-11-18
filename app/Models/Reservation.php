<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reservation
 *
 * @property $id
 * @property $ingress
 * @property $egress
 * @property $status
 * @property $detail_id
 * @property $users_id
 * @property $guest_id
 * @property $cottage_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Cottage $cottage
 * @property Detail $detail
 * @property Guest $guest
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reservation extends Model
{
    use HasFactory;
    static $rules = [
		'ingress' => 'required',
		'egress' => 'required',
		'status' => 'required',
		'detail_id' => 'required',
		'users_id' => 'required',
		'guest_id' => 'required',
		'cottage_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ingress','egress','status','detail_id','users_id','guest_id','cottage_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cottage()
    {
        return $this->hasOne('App\Models\Cottage', 'id', 'cottage_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail()
    {
        return $this->hasOne('App\Models\Detail', 'id', 'detail_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function guest()
    {
        return $this->hasOne('App\Models\Guest', 'id', 'guest_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }
    

}
