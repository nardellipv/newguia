<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Characteristic_commerce extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'commerce_id', 'characteristic_id'
    ];

    public function Characteristic()
    {
        return $this->belongsTo(Characteristic::class);
    }

    public function Commerce()
    {
        return $this->belongsTo(Commerce::class);
    }
}
