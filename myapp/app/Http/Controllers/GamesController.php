<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Game;
// use App\Recruitment;
use Abraham\TwitterOAuth\TwitterOAuth;

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

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        if ($request->file('image')->isValid()) {

            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/gameImages',$fileName);

            $fullFilePath = '/storage/gameImages/'.$fileName;
            $name = $request->name;

            Game::create([
            //   'user_id' => \Auth::user()->id,
              'name' => $name,
              'image' => $fullFilePath
            ]);
        }

        $game = new Game;

        $game->save();
        return redirect('/games')->with('flash', 'ゲームを作成しました。');
    }

    public function show($id)
    {
        $twitter = new TwitterOAuth(env('TWITTER_CLIENT_KEY'),
        env('TWITTER_CLIENT_SECRET'),
        env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
        env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET'));

        $tweets_params = ['q' => Game::findOrFail($id)->name ,'count' => '10'];
        $tweets = $twitter->get('search/tweets', $tweets_params)->statuses;

        return view('games.show', ['game' => Game::findOrFail($id)], compact('tweets'));
    }

    public function edit($id)
    {
      $game = Game::findOrFail($id);

      return view('games/edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        // if ($request->file('image')->isValid()) {

        //     $fileName = $request->file('image')->getClientOriginalName();
        //     $request->file('image')->storeAs('public/gameImages',$fileName);

        //     $fullFilePath = '/storage/gameImages/'.$fileName;
        //     $name = $request->name;

        //     Game::create([
        //     //   'user_id' => \Auth::user()->id,
        //       'name' => $name,
        //       'image' => $fullFilePath
        //     ]);
        // }
        $game = Game::findOrFail($id);
        $game->name = $request->name;
        $game->save();

        return redirect("/games")->with('flash', 'ゲームを更新しました。');
    }
}
