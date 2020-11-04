<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public $table = 'currency';
    protected $fillable = ['received_currency', 'bdt'];
}
