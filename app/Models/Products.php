<?php

namespace App\Models;

use App\Models\ProductCategories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Laravel\Scout\Searchable;

class Products extends Model
{
    use HasFactory;

    use Searchable;
    public function getCategory()
    {
        return $this->belongsTo(ProductCategories::class, 'product_cat', 'id');
    }
    public function searchableAs(): string
    {
        return 'products';
    }
}