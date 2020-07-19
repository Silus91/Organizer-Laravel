<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Card extends Model
{
    protected $guarded = [];

    public function user()
    {
       return $this->belongsTo(\App\User::class);
    }

    public function collections()
    {
        return $this->hasMany(\App\Collection::class);
    }

    public function attributes()
    {
        return $this->hasMany(\App\Attributes::class);
    }
}
