<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function game()
    {
        return $this->belongsTo('App\Models\Game');
    }
}
