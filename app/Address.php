<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $table = 'addresses';
    protected $fillable = ['user_id', 'location_id', 'area', 'address', 'mobile_number'];
}
