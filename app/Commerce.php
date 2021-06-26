<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{
    protected $fillable = [
        'name', 'address', 'phone', 'phoneWsp', 'web', 'twitter', 'instagram', 'facebook', 'logo', 'slug', 'about', 'votes_positive', 
        'user_id', 'province_id', 'region_id', 'visit', 'type'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Region()
    {
        return $this->belongsTo(Region::class);
    }
    
    public function Messages()
    {
        return $this->hasMany(Message::class);
    }

    public function Province()
    {
        return $this->belongsTo(Province::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function Characteristic()
    {
        return $this->belongsToMany(Characteristic::class);
    }
}
