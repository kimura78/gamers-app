<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'user_id',
    ];

    public static $rules = [
        'name' => 'required|string|max:50',
        'image' => 'required|image',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function recruitments() {
        return $this->hasMany('App\Models\Recruitment');
    }

    public function bookmarks() {
        return $this->hasMany('App\Models\Bookmark');
    }
}
