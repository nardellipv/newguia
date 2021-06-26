<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;

    public function Commerce()
    {
        return $this->belongsTo(Commerce::class);
    }
}
