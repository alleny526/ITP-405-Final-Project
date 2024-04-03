<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'anime_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'anime_id', 'id');
    }
}
