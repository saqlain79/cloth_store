<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'brand',
        'is_active',
    ];

    public function variants() {
        return $this->hasMany(ProductVariant::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
