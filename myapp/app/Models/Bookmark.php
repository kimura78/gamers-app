<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id',
    ];

    public static $rules = [
        'user_id' => 'required|string|max:50',
        'game_id' => 'required|image',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function game()
    {
        return $this->belongsTo('App\Models\Game');
    }
}
