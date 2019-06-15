<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $table='withdraws';
    protected $fillable=['user_id','mobile','amount','status'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
