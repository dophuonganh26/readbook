<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.home');
    }

    public function introduce()
    {
        return view('client.introduce');
    }

    public function author($id)
    {
        $author = User::find($id);
        $stories = Story::where('user_id', $author->id)->paginate(12);
        
        return view('client.author', compact('author', 'stories'));
    }

    public function followAuthor($id)
    {
        Follow::create([
            'author_id' => $id,
            'follower_id' => Auth::user()->id
        ]);

        return redirect()->back();
    }

    public function unfollowAuthor($id)
    {
        Follow::where([['author_id', $id], ['follower_id', Auth::user()->id]])->first()->delete();

        return redirect()->back();
    }
}
