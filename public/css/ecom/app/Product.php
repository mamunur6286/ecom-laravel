<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['product_name', 'image','retail_price','wholesale_price','wholesale_qnty','description','unit','slug'];

    public function category()
    {
            return $this->belongsTo(Category::class,'slug','slug');
    }
}
