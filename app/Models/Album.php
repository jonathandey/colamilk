<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    public static $validationRules = [
        'title' => 'required',
    ];

	protected $casts = [
		'smart' => 'boolean',
	];

    protected $fillable = [
        'title',
    ];

    public function scopeSmart($query)
    {
    	return $query->where('smart', true);
    }

    public function scopeMade($query)
    {
    	return $query->where('smart', false);
    }
}
