<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $guarded = [];

    public function card()
    {
       return $this->belongsTo(\App\Cards::class, 'foreign_key');
    }

    public function task()
    {
        return $this->hasMany(\App\Task::class);
    }
}
