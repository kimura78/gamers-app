<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'image',
    ];

    public function recruitments() {
        return $this->hasMany('App\Models\Recruitment');
    }

    public function bookmarks() {
        return $this->hasMany('App\Models\Bookmark');
    }
}
