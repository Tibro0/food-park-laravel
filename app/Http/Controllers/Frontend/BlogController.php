<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function blog(Request $request){
        $blogs = Blog::withCount(['comments'=> function($query){
            $query->where('status', 1);
        }])->with(['category', 'user'])->where('status', 1);

        if ($request->has('search') && $request->filled('search')) {
            $blogs->where(function($query) use ($request){
                $query->where('title', 'like', '%'. $request->search. '%')
                ->orWhere('description', 'like', '%'. $request->search . '%');
            });
        }

        if($request->has('category') && $request->filled('category')) {
            $blogs->whereHas('category', function($query) use ($request){
                $query->where('slug', $request->category);
            });
        }

        $blogs = $blogs->latest()->paginate(9);

        $categories = BlogCategory::where(['status' => 1])->orderBy('id', 'DESC')->get();
        return view('frontend.pages.blog', compact('blogs', 'categories'));
    }

    public function blogDetails(string $slug){
        $blog = Blog::with(['user'])->where(['slug' => $slug, 'status' => 1])->firstOrFail();
        $comments = $blog->comments()->where(['status' => 1])->orderBy('id', 'DESC')->paginate(15);
        $latestBlogs = Blog::select('id', 'title', 'slug', 'created_at', 'image')->where('status', 1)->where('id', '!=', $blog->id)->orderBy('id', 'DESC')->take(3)->get();
        $categories = BlogCategory::withCount(['blogs' => function($query){
            $query->where('status', 1);
        }])->where('status', 1)->get();

        $nextBlog = Blog::select('id', 'title', 'slug', 'image')->where('id', '>', $blog->id)->orderBy('id', 'ASC')->first();
        $previousBlog = Blog::select('id', 'title', 'slug', 'image')->where('id', '<', $blog->id)->orderBy('id', 'DESC')->first();
        return view('frontend.pages.blog-details', compact('blog', 'comments', 'latestBlogs', 'categories', 'nextBlog', 'previousBlog'));
    }

    public function blogCommentStore(Request $request, string $blog_id){
        $request->validate([
            'comment' => ['required', 'max:500'],
        ]);

        Blog::findOrFail($blog_id);

        $comment = new BlogComment();
        $comment->blog_id = $blog_id;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->save();

        toastr()->success('Comment Submitted Successfully and Waiting to Approve.');
        return redirect()->back();
    }
}
