<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'author_id', 'published'];

    // Define the relationship to the User model (Author)
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
