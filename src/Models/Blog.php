<?php

namespace EoxysIT\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{
    use HasFactory;
    protected $fillable=['title', 'slug', 'category', 'subcategory', 'tages', 'image', 'status', 'description','authername'];
}
