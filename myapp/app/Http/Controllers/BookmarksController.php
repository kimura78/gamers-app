<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use Auth;

class BookmarksController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::all();

        return view('bookmarks.index', compact('bookmarks'));
    }

    public function create()
    {
        return view('bookmarks.create');
    }

    public function store(Request $request)
    {
        $bookmark = new bookmark;
        $bookmark->user_id = Auth::user()->id;
        $bookmark->game_id = $request->game_id;
        $bookmark->save();

        return redirect('/game');
    }
}
