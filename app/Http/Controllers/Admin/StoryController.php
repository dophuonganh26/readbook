<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Chapter;
use App\Models\Follow;
use App\Models\User;
use App\Notifications\AuthorNotification;
use Illuminate\Support\Facades\Notification;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::all();

        return view('admin.stories.list', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = Story::find($id);
        $chapters = Chapter::where('story_id', $id)->get();

        return view('admin.stories.chapter', compact('story', 'chapters'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateStatus(Request $request, $id, $status)
    {
        $story = Story::find($id);
        $author = $story->user_id;
        $followers = Follow::where('author_id', $author)->pluck('follower_id');
        $story->status = $status;
        if ($status == 2) {
            $story->reason = $request->reason;
        } else {
            $story->reason = '';
        }
        $story->save();

        if ($status == 1 && count($followers) > 0) {
            foreach ($followers as $follower) {
                Notification::send(User::find($follower), new AuthorNotification(1, User::find($author)->name, $story->name));
            }
        }

        toastr()->success('Cập nhật thành công');

        return redirect()->route('story.list');
    }

    public function showChapter($id)
    {
        $chapter = Chapter::find($id);

        return view('admin.stories.chapter-detail', compact('chapter'));
    }
}
