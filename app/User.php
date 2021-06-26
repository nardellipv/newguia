<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'type', 'password', 'lastLogin'
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

    public function Commerce()
    {
        return $this->hasOne(Commerce::class);
    }

    // scope

    public function scopeNewFriend($query, $newFriend)
    {
        if($newFriend != NULL)
            return $query->whereNotIn('id', $newFriend);
    }
    
    
    public function scopeAddedFriends($query, $addedFriends)
    {
        if($addedFriends != NULL)
            return $query->whereIn('id', $addedFriends);
    }
}
