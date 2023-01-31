<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

class QueryController extends Controller
{
    public function tags()
    {
        //get most used tags
        // $result = Tag::select('id', 'title')->orderByDesc(
        //     DB::table('post_tags')
        //         ->selectRaw('count(tag_id) as tag_count')
        //         ->whereColumn('tags.id', 'post_tags.tag_id')
        //         ->orderBy('tag_count', 'desc')
        //         ->limit(1)
        // )->get();

        dump($result->toArray());
    }

    public function posts()
    {
        //find latest post with total comments count
        // $result = Post::select('id', 'title')->latest()->take(5)->withCount('comments')->get();

        //get most populor post
        $result = Post::select('id', 'title')->orderByDesc(
            Comment::selectRaw('count(*) as post_count')
                ->whereColumn('posts.id', 'comments.post_id')
                ->orderBy('post_count', 'desc')
                ->limit(1)
        )->take(5)->withCount('comments')->get();
        dump($result->toArray());

    }
}
