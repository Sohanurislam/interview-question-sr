<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'sku', 'description'
    ];

    public function price()
    {
     return $this->hasOne(ProductVariantPrice::class);
    }

    public function image()
    {
        return $this->hasOne(ProductImage::class);
    }
      public function variant()
    {
        return $this->hasMany(ProductVariant::class);
    }


}
