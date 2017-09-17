<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\Media;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

/**
 * Class Property
 * @package App
 */
class Property extends Model implements HasMediaConversions
{

    use HasMediaTrait;
    use Sluggable;

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

    public function scopeStatusName($query, $status)
    {
        return Property::whereHas('status', function($query) use ($status) {
            $query->where('name', $status);
        });
    }

    public function scopeStatusNotName($query, $status)
    {
        return Property::whereHas('status', function($query) use ($status) {
            $query->where('name', '<>', $status);
        });
    }

    public function agents()
    {
        return $this->belongsToMany(Agent::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(230)
            ->sharpen(10)
            ->optimize();
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'address'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
