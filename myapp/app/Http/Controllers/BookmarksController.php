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
}
