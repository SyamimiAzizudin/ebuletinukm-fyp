<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Category extends Model
{
	/**
	 *
	 */
    protected $fillable = [
        'name'
    ];

	/**
	 *
	 */
    public function beritas()
    {
        return $this->morphedByMany(Berita::class, 'categorizables');
    }

    /**
     * 
     */
    public function events()
    {
        return $this->morphedByMany(Event::class, 'categorizables');
    }


}
