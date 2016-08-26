<?php

namespace App\Models;

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
}
