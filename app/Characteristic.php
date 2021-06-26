<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    public $timestamps = false;

    public function Commerce()
    {
        return $this->belongsTo(Commerce::class);
    }

    public function CharacteristicCommerce()
    {
        return $this->hasMany(CharacteristicCommerce::class);
    }
}
