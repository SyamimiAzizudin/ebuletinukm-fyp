<?php

namespace App;

use App\User;
use App\Pengarang;
use App\Pembaca;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    /**
     *
     */
    protected $fillable = [
        'tajuk',
        'huraian',
        'lokasi',
        'kumpulan_sasaran',
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
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     *
     */
    public function categories()
    {
      return $this->morphToMany(Category::class, 'categorizable');
    }

}
