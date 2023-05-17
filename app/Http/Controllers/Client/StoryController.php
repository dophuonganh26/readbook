<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Wishlist;
use App\Models\Category;
use App\Models\ParentCategory;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Evaluation;
use App\Models\CookieUserChapter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Cookie;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::where('user_id', Auth::user()->id)->get();

        return view('client.stories.list', compact('stories'));
    }

    public function showUploadStory()
    {
        $categories = Category::all();
        $parentCategories = ParentCategory::where('status', 1)->get();

        return view('client.stories.upload-story', compact('categories', 'parentCategories'));
    }

    public function uploadStory(Request $request)
    {
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $request->image->storeAs('/public/images/stories', $request->image->getClientOriginalName());
                Story::create([
                    'name' => $request->name,
                    'user_id' => Auth::user()->id,
                    'author' => $request->author ?? null,
                    'parent_category_id' => $request->parent_category,
                    'category_id' => $request->category,
                    'short_description' => $request->content,
                    'image' => '/storage/images/stories/' . $request->image->getClientOriginalName()
                ]);
                toastr()->success('Thêm thành công');

                return redirect()->route('client.story');
            }
        }
    }

    public function showWishlist()
    {
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->paginate(12);
        
        return view('client.wishlists', compact('wishlists'));
    }

    public function show($id)
    {
        $story = Story::find($id);
        $chapters = Chapter::where('story_id', $id)->get();

        return view('client.chapters.list', compact('story', 'chapters'));
    }

    public function addWishlist(Request $request)
    {
        Wishlist::create([
            'story_id' => $request->storyId,
            'user_id' => Auth::user()->id
        ]);

        return response()->json([
            'status' => 200
        ]);
    }

    public function destroy($id)
    {
        Story::find($id)->delete();
        toastr()->success('Xóa thành công');

        return redirect()->route('client.story');
    }

    public function search(Request $request)
    {
        $q = $request->q;
        if (!is_null($q)) {
            $stories = Story::where([['name','like','%'.$q.'%'], ['status', 1]])->paginate(12);
        } else {
            $stories = Story::paginate(12);
        }

        return view('client.search',compact('stories', 'q'));
    }

    public function edit($id)
    {
        $story = Story::find($id);
        $categories = Category::all();
        $parentCategories = ParentCategory::where('status', 1)->get();

        return view('client.stories.edit', compact('story', 'parentCategories', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $story = Story::find($id);
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $request->image->storeAs('/public/images/stories', $request->image->getClientOriginalName());
                $story->image = '/storage/images/stories/' . $request->image->getClientOriginalName();
            }
        }

        $story->name = $request->name;
        $story->user_id = Auth::user()->id;
        $story->author = $request->author ?? null;
        $story->parent_category_id = $request->parent_category;
        $story->category_id = $request->category;
        $story->short_description = $request->content;
        $story->save();
        toastr()->success('Cập nhật thành công');

        return redirect()->route('client.story');
    }

    public function detail($id)
    {
        $rating = Evaluation::where('story_id', $id)->avg('star');
        $rating = round($rating);
        $story = Story::find($id);
        $comments = Comment::where('story_id', $id)->join('users', 'users.id', '=', 'comments.user_id')->orderBy('created_at', 'DESC')->get(['comments.*', 'users.name']);

        return view('client.detail', compact('story', 'comments', 'rating'));
    }

    public function read($storyId, $chapterId)
    {
       $chapters = Chapter::where('story_id', $storyId)->get();
       $chapter = Chapter::find($chapterId);
       $previous = Chapter::where([['id', '<', $chapterId], ['story_id', $storyId]])->max('id');
       $next = Chapter::where([['id', '>', $chapterId], ['story_id', $storyId]])->min('id');
       if (!is_null(Cookie::get('user_token'))) {
            if (!CookieUserChapter::where([['user_token', Cookie::get('user_token')], ['story_id', $storyId]])->exists()) {
                CookieUserChapter::create([
                    'user_token' => Cookie::get('user_token'),
                    'chapter_id' => $chapterId,
                    'story_id' => $storyId
                ]);
            } else {
                CookieUserChapter::where([['user_token', Cookie::get('user_token')], ['story_id', $storyId]])->update(['chapter_id' => $chapterId]);
            }
       }
       // increment view
       Event::dispatch('chapter.view', $chapter);
       return view('client.read', compact('chapters', 'chapter', 'storyId', 'chapterId', 'previous', 'next'));
    }

    public function category($id)
    {
        $category = Category::find($id);
        $stories = Story::where('category_id', $id)->paginate(12);

        return view('client.category', compact('category', 'stories'));
    }

    public function rating(Request $request)
    {
        if (Auth::check()) {
            $data = $request->all();
            Evaluation::create([
                'user_id' => Auth::user()->id,
                'story_id' => $data['story_id'],
                'star' => $data['index']
            ]);
            
            return response()->json([
                'status' => 200
            ]);
        } else {
            return response()->json([
                'status' => 403
            ]);
        }
    }

    public function deleteWishlist($id)
    {
        Wishlist::find($id)->delete();
        toastr()->success('Xóa thành công');

        return redirect()->back();
    }

    public function updateRelease($id, $release) 
    {
        Story::where('id', $id)->update(['release' => $release]);
        toastr()->success('Cập nhật thành công');

        return redirect()->back();
    }
}
