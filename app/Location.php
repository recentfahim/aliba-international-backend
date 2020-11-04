<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $table = 'locations';
    protected $fillable = ['name', 'is_active'];

    public function parent()
    {
        return $this->belongsTo(Location::class);
    }
    public function child()
    {
        return $this->hasMany(Location::class);
    }
}
