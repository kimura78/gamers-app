<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GamesController extends Controller
{   
    public function index(Request $request)
    {
        // $keyword = $request->input('keyword');

        // // $games = Game::all();
        // // return view('game/index', compact('games'));
        // $query = Game::query();
        // if(!empty($keyword))
        // {
        // $query->Where('name','like','%'.$keyword.'%');
        // }
        // $games = $query->orderBy('id','desc')->paginate(10);
        return view('games.index');
    }
}
