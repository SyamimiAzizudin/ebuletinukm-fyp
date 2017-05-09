<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Pembaca extends Model
{
    /**
     *
     */
    protected $fillable = [
        'nama',
        'telefon',
        'fakulti',
        'jabatan',
        'persatuan',
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
