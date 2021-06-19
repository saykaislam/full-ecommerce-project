<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo('App\Model\Product','product_id');
    }
}
