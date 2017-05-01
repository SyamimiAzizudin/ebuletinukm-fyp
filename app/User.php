<?php

namespace App;

use App\Event;
use App\Berita;
use App\Pengarang;
use App\Pembaca;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_matrik', 'username', 'email', 'password', 'userRole'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at',
    ];

    /**
     * Get events
     */
    public function events()
    {
        return $this->hasMany(Event::class, 'user_id');
    }

    /**
     * Get news
     */
    public function news()
    {
        return $this->hasMany(Berita::class, 'user_id');
    }

    /**
     *
     */
    public function pembaca()
    {
        return $this->hasOne(Pembaca::class, 'user_id');
    }

    /**
     *
     */
    public function pengarang()
    {
        return $this->hasOne(Pengarang::class, 'user_id');
    }

    /**
     * Get profile
     */
    public function profile()
    {
        if ($this->userRole == 'pembaca') {
            return $this->pembaca();
        } else {
            return $this->pengarang();
        }
    }

}
