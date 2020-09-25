<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Storage;
use App\Models\Game;
// use App\Recruitment;
// use Abraham\TwitterOAuth\TwitterOAuth;

class GamesController extends Controller
{   
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Game::query();
        if(!empty($keyword))
        {
        $query->Where('name','like','%'.$keyword.'%');
        }
        $games = $query->orderBy('id','desc')->paginate(10);
        return view('games.index', compact('games', 'keyword'));
    }
}
