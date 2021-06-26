<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $timestamps = false;

    public function Commerce()
    {
        return $this->hasMany(Commerce::class);
    }
}
