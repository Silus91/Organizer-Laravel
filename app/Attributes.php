<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    protected $guarded = [];

    public function card()
    {
       return $this->belongsTo(\App\Cards::class);
    }

    public function attribute()
    {
        return $this->hasMany(\App\Attribute::class);
    }
    public function task()
    {
        return $this->hasMany(\App\Attribute::class);
    }
}
