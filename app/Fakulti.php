<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakulti extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
    ];
}