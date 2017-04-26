<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
	'beritas' => 'App\Berita',
	'events' => 'App\Event',
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
