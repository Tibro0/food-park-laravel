<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productImages(){
        return $this->hasMany(ProductGallery::class);
    }

    public function productSizes(){
        return $this->hasMany(ProductSize::class);
    }

    public function productOptions(){
        return $this->hasMany(ProductOption::class);
    }

    public function reviews(){
        return $this->hasMany(ProductRating::class);
    }
}
