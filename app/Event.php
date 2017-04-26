<?php

namespace App;

use App\MultipleGambar;
use App\User;
use App\Category;
use App\EventCategory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['tajuk', 'huraian', 'tarikh', 'masa', 'lokasi', 'tempoh', 'kumpulan_sasaran', 'max_peserta', 'penganjur', 'telephone', 'gambar' ];

    protected $dates = ['created_at', 'updated_at', 'expired_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
      return $this->morphMany(Category::class, 'categorizable');
    }

    public function MultipleGambar()
    {
      return $this->hasMany(MultipleGambar::class);
    }
    
}
