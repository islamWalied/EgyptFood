<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'image'];

    //Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Accessor for image URL

public function getImageUrlAttribute()
    {
        if (!empty($this->image) && file_exists(public_path('uploads/' . $this->image))) {
            return asset('uploads/' . $this->image);
        }

        return asset('uploads/default-avatar.png');
    }


}
