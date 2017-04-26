<?php

namespace App;

use App\Event;
use Illuminate\Database\Eloquent\Model;

class MultipleGambar extends Model
{
    protected $fillable = [
	    'event_id', 
	    'image_path'
    ];

    protected $hidden = [
	    'created_at',
	    'updated_at',
	    'id',
	    'event_id'
    ];

    public function event()
    {
    	return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function getImagePathAttribute($value)
    {
    	return asset($value);
    }

}
