<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function collection()
    {
       return $this->belongsTo(\App\Collection::class);
    }
}

/* tasksGroup ?? */
