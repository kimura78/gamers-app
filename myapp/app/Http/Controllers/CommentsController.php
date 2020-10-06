<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Recruitment;
use Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, Comment::$rules);

        $comment = new comment;
        $comment->content = $request->content;
        $comment->user_id = Auth::user()->id;
        $comment->recruitment_id = $request->recruitment_id;

        $comment->save();
        return back()->with('flash', 'コメントを作成しました。');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back()->with('flash', 'コメントを削除しました。');
    }
}
