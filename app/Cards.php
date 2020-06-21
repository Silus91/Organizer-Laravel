<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    protected $guarded = [];

    public function user()
    {
       return $this->belongsTo(\App\User::class);
    }

    public function tasks()
    {
        return $this->hasMany(\App\Tasks::class);
    }

    public function attributes()
    {
        return $this->hasMany(\App\Attributes::class);
    }
}
