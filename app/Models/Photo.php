<?php

namespace App\Models;

use Storage;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $casts = [
    	'public' => 'boolean',
    ];

    protected $fillable = [
    	'title',
    	'description',
    ];

    protected $appends = [
        'thumbnail',
    ];

    public function album()
    {
    	return $this->belongsTo('App\Models\Album');
    }

    public function scopePublic($query)
    {
    	return $query->where('shared', true);
    }

    public function scopePrivate($query)
    {
    	return $query->where('shared', false);
    }

    public function getThumbnailAttribute()
    {
        return Storage::disk('local')->url('photos/a/' . $this->album_id . '/' . $this->file_name);
    }
}
