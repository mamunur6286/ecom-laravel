<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table='order_details';
    protected $fillable=['user_id','name','mobile','country','city','zip_code','address','status'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
