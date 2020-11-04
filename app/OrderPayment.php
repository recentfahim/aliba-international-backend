<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    public $table = 'order_payments';
    protected $fillable = ['order_id', 'method', 'amount', 'transaction_id', 'account_number'];
}
