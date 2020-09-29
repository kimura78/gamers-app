<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use App\Models\Comment;
use Auth;

class RecruitmentsController extends Controller
{
    public function index()
    {
        return view('recruitments.index', compact('recruitments'));
    }

    public function create($game_id)
    {
        return view('recruitments.create', compact('game_id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, Recruitment::$rules);

        $recruitment = new recruitment;
        $recruitment->title = $request->title;
        $recruitment->start_time = $request->start_time;
        $recruitment->user_id = Auth::user()->id;
        $recruitment->game_id = $request->game_id;

        $recruitment->save();
        return redirect("/")->with('flash', 'プレイ募集を作成しました。');
    }

    public function show($id)
    {
        $comments = Comment::where('recruitment_id', $id)->get();

        return view('recruitments.show', ['recruitment' => Recruitment::findOrFail($id)], compact('comments'));
    }

    public function edit($id)
    {
      $recruitment = Recruitment::findOrFail($id);
      return view('recruitments.edit', compact('recruitment'));
    }

    public function update(Request $request, $id)
    {
        $recruitment = Recruitment::findOrFail($id);
        $recruitment->title = $request->title;
        $recruitment->start_time = $request->start_time;

        $recruitment->save();

        return view('recruitments.show', ['recruitment' => Recruitment::findOrFail($id)])->with('flash', 'プレイ募集を編集しました。');
    }

    public function destroy($id)
    {
        $recruitment = Recruitment::findOrFail($id);
        $recruitment->delete();

        return redirect("/");
    }
}
