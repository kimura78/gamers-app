<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id',
        'title',
        'start_time',
    ];

    public static $rules = [
        'title' => 'required|string|max:50',
        'start_time' => 'required|string|max:20',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function game()
    {
        return $this->belongsTo('App\Models\Game');
    }

    public function comment() {
        return $this->hasMany('App\Models\Comment');
    }
}
