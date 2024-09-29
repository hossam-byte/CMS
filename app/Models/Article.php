<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['author', 'email', 'title', 'content', 'category', 'tags'];

    // Define the relationship to the User model (Author)
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
