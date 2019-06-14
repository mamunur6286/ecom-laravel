<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table='settings';
    protected $fillable=['header_logo','banner','referal_amount','active_amount','address','mobile','email','bkash_no'];
}
