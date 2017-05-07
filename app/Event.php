<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     *
     */
    protected $fillable = [
        'tajuk',
        'huraian',
        'lokasi',
        'masa',
        'tempoh',
        'kumpulan_sasaran',
        'max_peserta',
        'penganjur',
        'telephone',
        'gambar'
    ];

    /**
     *
     */
    protected $dates = [
        'tarikh',
        'created_at',
        'updated_at',
        'expired_at'
    ];

    /**
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     *
     */
    public function categories()
    {
      return $this->morphMany(Category::class, 'categorizable');
    }

    /**
     *
     */
    public function MultipleGambar()
    {
      return $this->hasMany(MultipleGambar::class);
    }

}
