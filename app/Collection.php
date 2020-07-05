<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $guarded = [];

    public function card()
    {
        return $this->belongsTo(\App\Card::class);
    }

    public function tasks()
    {
        return $this->hasMany(\App\Task::class);
    }
}
