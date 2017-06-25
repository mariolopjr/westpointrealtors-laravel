<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = false;

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }
}
