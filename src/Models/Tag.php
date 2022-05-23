<?php

namespace EoxysIT\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
     protected $fillable=['title',  'image', 'discription'];
}
