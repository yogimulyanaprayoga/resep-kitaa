<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::query()
            ->when(request('search'), function ($query) {
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('short_description', 'like', '%' . request('search') . '%');
            })
            ->select('title', 'image', 'slug', 'author_id', 'short_description', 'content', 'created_at')
            ->latest()
            ->paginate(6);
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail();

        $otherPosts = BlogPost::where('id', '!=', $post->id)
            ->latest()
            ->take(4)
            ->get();
        return view('blog.show', compact('post', 'otherPosts'));
    }
}
