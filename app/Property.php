<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    protected $guarded = ['user_id'];

    public function scopeActive($query, $bool = true)
    {
        return $query->where('active', $bool);
    }

    public function scopeFavorite($query, $bool = true)
    {
        return $query->where('favorite', $bool);
    }

    public function scopeRental($query, $bool = true)
    {
        return $query->where('rental', $bool);
    }

    public function agents()
    {
        $this->belongsToMany(User::class);
    }
}
