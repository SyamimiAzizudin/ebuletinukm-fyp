<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    /**
     * 
     */
    protected $fillable = [
        'user_id',
        'nama',
        'telefon',
        'fakulti',
        'persatuan',
        'jawatan',
        'gambar'
    ];

    /**
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
