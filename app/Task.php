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
    
    public function toggleCompleted()
    {
        $this->completed = !$this->completed;
        return $this;
    }
}

/* tasksGroup ?? */
