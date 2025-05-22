<?php

namespace App\Models;

use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class News extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = "news";

    public function getCategory()
    {
        return $this->belongsTo(NewsCategory::class, 'news_cat', 'id');
    }
    public function searchableAs(): string
    {
        return 'news_table';
    }

}