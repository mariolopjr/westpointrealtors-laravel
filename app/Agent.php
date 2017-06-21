<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
