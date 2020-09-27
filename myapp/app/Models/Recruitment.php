<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function game()
    {
        return $this->belongsTo('App\Game');
    }
}
