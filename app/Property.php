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

    /**
     * Set the polymorphic relation.
     *
     * @return mixed
     */
    public function media()
    {
        // TODO: Implement media() method.
    }

    /**
     * Move a file to the medialibrary.
     *
     * @param string|\Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return \Spatie\MediaLibrary\FileAdder\FileAdder
     */
    public function addMedia($file)
    {
        // TODO: Implement addMedia() method.
    }

    /**
     * Copy a file to the medialibrary.
     *
     * @param string|\Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return \Spatie\MediaLibrary\FileAdder\FileAdder
     */
    public function copyMedia($file)
    {
        // TODO: Implement copyMedia() method.
    }

    /**
     * Determine if there is media in the given collection.
     *
     * @param $collectionMedia
     *
     * @return bool
     */
    public function hasMedia(string $collectionMedia = ''): bool
    {
        // TODO: Implement hasMedia() method.
    }

    /**
     * Get media collection by its collectionName.
     *
     * @param string $collectionName
     * @param array|callable $filters
     *
     * @return \Spatie\MediaLibrary\Media
     */
    public function getMedia(string $collectionName = 'default', $filters = [])
    {
        // TODO: Implement getMedia() method.
    }

    /**
     * Remove all media in the given collection.
     *
     * @param string $collectionName
     */
    public function clearMediaCollection(string $collectionName = 'default')
    {
        // TODO: Implement clearMediaCollection() method.
    }

    /**
     * Remove all media in the given collection except some.
     *
     * @param string $collectionName
     * @param \Spatie\MediaLibrary\Media[]|\Illuminate\Support\Collection $excludedMedia
     *
     * @return string $collectionName
     */
    public function clearMediaCollectionExcept(string $collectionName = 'default', $excludedMedia = [])
    {
        // TODO: Implement clearMediaCollectionExcept() method.
    }

    /**
     * Determines if the media files should be preserved when the media object gets deleted.
     *
     * @return \Spatie\MediaLibrary\Media
     */
    public function shouldDeletePreservingMedia()
    {
        // TODO: Implement shouldDeletePreservingMedia() method.
    }

    /**
     * Cache the media on the object.
     *
     * @param string $collectionName
     *
     * @return mixed
     */
    public function loadMedia(string $collectionName)
    {
        // TODO: Implement loadMedia() method.
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
