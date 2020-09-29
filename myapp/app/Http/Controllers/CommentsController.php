<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, Comment::$rules);

        $comment = new comment;
        $comment->content = $request->content;
        $comment->user_id = Auth::user()->id;
        $comment->recruitmet_id = $request->recruitment_id;

        $comment->save();
        return redirect("/")->with('flash', 'コメントを作成しました。');
    }
}
