<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'category_id', 'description', 'price', 'offer', 'available','photo', 'commerce_id'
    ];

    public function Commerce()
    {
        return $this->belongsTo(Commerce::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
