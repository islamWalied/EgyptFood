<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'image',
        'category_id',
    ];

    public function children()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Relation with products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        return $this->image ? 'storage/' . $this->image : 'https://via.placeholder.com/150';
    }
}
