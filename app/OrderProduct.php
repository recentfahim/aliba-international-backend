<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public $table = 'order_products';
    protected $fillable = ['order_id', 'item', 'item_unit_price', 'item_quantity', 'sub_total', 'total'];
}
