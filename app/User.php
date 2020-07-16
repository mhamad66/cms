<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\profile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasAdmin()
    {
        return $this->role == 'admin';
    }

    public function hasImage()
    {
        if (preg_match('/profilesImage/', $this->profile->image, $match)) {
            return true;
        } else {

            return false;
        }
    }
    public function getImage()
    {
        return $this->profile->image;
    }
    public function getAvatar()
    {
        $hash =  md5(strtolower(trim($this->attributes['email'])));

        return "https://gravatar.com/avatar/$hash";
    }
    public function profile()
    {
        return $this->hasOne(profile::class);
    }
}
