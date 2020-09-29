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
        $bookmarks = Bookmark::where('user_id', Auth::user()->id)->get();
        return view('bookmarks.index', compact('bookmarks'));
    }

    public function store(Request $request)
    {
        $bookmark = new bookmark;
        $bookmark->user_id = Auth::user()->id;
        $bookmark->game_id = $request->game_id;
        $bookmark->save();

        return redirect('/games')->with('flash', 'ブックマークを登録しました。');
    }

    public function destroy($id)
    {
        $bookmark = Bookmark::findOrFail($id);
        $bookmark->delete();

        return redirect("/games")->with('flash', 'ブックマークを解除しました。');
    }
}
