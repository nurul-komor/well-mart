<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategories extends Model
{
    use HasFactory;

    public function getProducts()
    {
        return $this->hasMany(Products::class, 'product_cat', 'id');
    }
}