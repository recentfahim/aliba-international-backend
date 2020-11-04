<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    public $table = 'payment_histories';
    protected $fillable = ['order_id', 'gateway', 'description', 'cart_data', 'ipn', 'ipn_data'];
}
