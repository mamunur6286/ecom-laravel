<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table='accounts';
    protected $fillable=['user_id','mobile','amount','transaction_id','status'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
