<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\User;
use App\Models\Story;
use App\Models\Follow;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ChapterNotification;

class ChapterController extends Controller
{
    public function showUploadChapter($storyId)
    {
        return view('client.chapters.upload-chapter', compact('storyId'));
    }

    public function uploadChapter(Request $request, $storyId)
    {
        $story = Story::find($storyId);
        $author = $story->user_id;
        $followers = Follow::where('author_id', $author)->pluck('follower_id');
        Chapter::create([
            'story_id' => $storyId,
            'name' => $request->name,
            'content' => $request->content
        ]);
        toastr()->success('Thêm thành công');
        foreach ($followers as $follower) {
            Notification::send(User::find($follower), new ChapterNotification(2, $story->name, $request->name));
        }
        
        return redirect()->route('client.show.story', ['id' => $storyId]);
    }

    public function edit($id)
    {
        $chapter = Chapter::find($id);

        return view('client.chapters.edit', compact('chapter'));
    }

    public function update(Request $request, $id)
    {
        $chapter = Chapter::find($id);
        $chapter->name = $request->name;
        $chapter->content = $request->content;
        $chapter->save();
        toastr()->success('Cập nhật thành công');

        return redirect()->route('client.show.story', ['id' => $chapter->story_id]);
    }

    public function destroy($id)
    {
        Chapter::find($id)->delete();
        toastr()->success('Xóa thành công');

        return redirect()->back();
    }

    public function show($id)
    {
        $chapter = Chapter::find($id);
        
        return view('client.chapters.show', compact('chapter'));
    }
}
