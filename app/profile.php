<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\user;
class profile extends Model
{
    protected $fillable = [
       'user_id', 'about', 'image', 'facebook','twiteer',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
