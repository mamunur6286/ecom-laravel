<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable=['user_id','order_details_id','product_name','image','price','qnty','subtotal','status'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function biiAddress()
    {
        return $this->belongsTo(OrderDetails::class,'order_details_id','id');
    }
}
