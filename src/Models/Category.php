<?php

namespace EoxysIT\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['title', 'slug', 'category', 'subcategory',  'image', 'discription','parent_id'];

    public function subcategory()
    {
        return $this->hasMany(\EoxysIT\Blog\Models\Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(\EoxysIT\Blog\Models\Category::class, 'parent_id');
    }

    public function subcategories(){
        return $this->hasMany(\EoxysIT\Blog\Models\Category::class, 'parent_id');
    }
}
