<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $twitter = new TwitterOAuth(env('TWITTER_CLIENT_KEY'),
        env('TWITTER_CLIENT_SECRET'),
        env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
        env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET'));

        $tweets_params = ['q' => 'テスト' ,'count' => '10'];
        $tweets = $twitter->get('search/tweets', $tweets_params)->statuses;

        // $recruitments = Recruitment::all();
        // return view('game.show', ['game' => Game::findOrFail($id)], compact('recruitments', 'tweets'));
        return view('home.index', compact('tweets'));
    }
}
