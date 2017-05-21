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
        'masaMula',
        'masaAkhir',
        'lokasi',
        'kumpulan_sasaran',
        'max_peserta',
        'penganjur',
        'telephone',
        'gambar'
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    /**
     *
     */
    protected $dates = [
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
      return $this->morphToMany(Category::class, 'categorizable');
    }

    /**
     *
     */
    public function MultipleGambar()
    {
      return $this->hasMany(MultipleGambar::class);
    }

}
