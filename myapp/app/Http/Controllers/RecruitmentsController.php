<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recruitment;
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
        return view('recruitments.show', ['recruitment' => Recruitment::findOrFail($id)]);
    }
}
