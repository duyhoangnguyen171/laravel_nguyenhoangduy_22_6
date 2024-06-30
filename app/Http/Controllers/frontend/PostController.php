<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\TOpic;


class PostController extends Controller
{
    public function index()
    {
        $post_new = Post::where('status', '=', 1)
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();

        return view('frontend.post', compact('post_new'));
    }
    public function post()
    {
        $list_post = Post::where([['status', '=', 1], ['type', '=', 'post']])
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $post_new = Post::where('status', '=', 1)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('frontend.post_item', compact('list_post', 'post_new'));
    }
    public function detail($slug)
    {
        $post = Post::where([['slug', '=', $slug], ['status', '=', 1]])->first();
        $args = [
            ['status', '=', 1], ['type', '=', 'post'],
            ['topic_id', '=', $post->topic_id], ['id', '!=', $post->id]
        ];
        $list_post = Post::where($args)
            ->orderBy('created_at', 'desc')
            ->limit(4)->get();
        $post_new = Post::where('status', '=', 1)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $post_list = Post::where([['status', '=', 1], ['id', '!=', $post->id]])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        return view('frontend.post_detail', compact('list_post', 'post', 'post_new', 'post_list'));
    }
   
}
