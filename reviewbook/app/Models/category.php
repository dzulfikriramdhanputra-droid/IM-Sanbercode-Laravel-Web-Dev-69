<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'posts';

    protected $fillable = ['name', 'content', 'image', 'category_id'];

    public function genre()
    {
        return $this->belongsTo(post::class, 'genre_id');
    }
}
