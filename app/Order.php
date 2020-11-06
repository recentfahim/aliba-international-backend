<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Location;

class Order extends Model
{
    public $table = 'orders';
    protected $fillable = ['user_id', 'paymentmethod', 'total_amount', 'delivery_charge', 'location_id', 'delivery_address', 'status'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }
}
