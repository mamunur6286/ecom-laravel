<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userMessage extends Model
{
    protected $table='user_messages';
    protected $fillable=['user_id','message','status'];

    public function user()
    {
        return $this->hasMany(users::class );
    }
}
