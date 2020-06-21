<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $guarded = [];

    public function attributes()
    {
       return $this->belongsTo(\App\Attributes::class);
    }
}
