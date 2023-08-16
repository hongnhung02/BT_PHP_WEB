<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'description',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getProducts($count = 4)
    {
        return $this->products()->take($count)->orderBy('id', 'desc')->get();
    }
}
