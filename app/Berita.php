<?php

namespace App;

use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = ['tajuk', 'huraian', 'lokasi', 'kumpulan_sasaran', 'gambar'];
    
    protected $dates = ['created_at', 'updated_at', 'expired_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
      return $this->morphMany(Category::class, 'categorizable');
    }

}
