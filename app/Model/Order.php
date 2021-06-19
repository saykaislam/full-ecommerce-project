<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function order_details()
    {
        return $this->hasOne('App\Model\OrderDetails', 'order_id');

    }
    public function OrderTempCommission()
    {
        return $this->hasOne('App\Model\OrderTempCommission', 'order_id');
    }
}
