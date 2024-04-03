<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function anime()
    {
        return $this->belongsTo(Anime::class, 'anime_id');
    }
}
