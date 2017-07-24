<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }
}
