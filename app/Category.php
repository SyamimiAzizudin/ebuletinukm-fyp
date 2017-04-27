<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
	'beritas' => 'Berita::class',
	'events' => 'Event::class',
]);

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function categorizable()
    {
        return $this->morphTo();
    }

}
