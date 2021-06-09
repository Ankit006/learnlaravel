<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        "excerpt",
        "body",
        "category_id"
    ];


    // each post is belongsTo a category

    public function category()
    {
       // hasone,hasmany,belongsTo,belongsToMany
          return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}