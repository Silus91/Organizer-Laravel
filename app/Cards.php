<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function scopeUserCards($query)
    {
        $user_id = Auth::user()->id;
        return $query->where('user_id', $user_id);
    }
}
