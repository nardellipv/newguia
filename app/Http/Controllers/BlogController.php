<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function listBlog()
    {
        $posts = Blog::where('status', 'ACTIVE')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('web.blog.index', compact('posts'));
    }

    public function postBlog($slug)
    {
        $post = Blog::where('slug', $slug)
            ->first();

        Blog::where('id', $post->id)
            ->increment('view', 1);

        return view('web.blog.post', compact('post', 'commercesPro', 'commentsPost', 'countCommentBlog'));
    }

    public function postBlogLike($id)
    {
        Blog::where('id', $id)
            ->increment('like', 1);

        toast('Muchas gracias por tu voto!','success');
        return back();
    }
}
