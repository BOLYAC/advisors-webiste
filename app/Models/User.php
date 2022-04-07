<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Overtrue\LaravelFollow\Followable;


class User extends Authenticatable
{
    use Notifiable, Followable ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'details', 'status', 'photo_file', 'title', 'row_no'
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
        'status' => 'boolean'
    ];

    public function favorites()
    {
        return $this->belongsToMany(Project::class, 'user_follower')->withTimestamps();
    }
}
