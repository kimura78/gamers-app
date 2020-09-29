<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'recruitment_id',
        'content',
    ];

    public static $rules = [
        'content' => 'required|string|max:300',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function recruitments() {
        return $this->belongsTo('App\Models\Recruitment');
    }
}
