<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name']; // Allow mass assignment for the 'name' field

    // Define the relationship with the User model
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
