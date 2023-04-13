<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'title',
        'path',
        'description',
        'category',
        'restrictions',
        'likes',
        'dislikes',
        'likes_to_dislikes'
    ];
}
