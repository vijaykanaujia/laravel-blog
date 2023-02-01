<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;

class QueryController extends Controller
{
    public function tags()
    {
        //get most used tags
        // $result = Tag::select('id', 'title')->orderByDesc(
        //     DB::table('post_tag')
        //         ->selectRaw('count(tag_id) as tag_count')
        //         ->whereColumn('tags.id', 'post_tag.tag_id')
        //         ->orderBy('tag_count', 'desc')
        //         ->limit(1)
        // )->get();

        $result = Tag::select('id', 'title')->withCount('posts')->orderByDesc('posts_count')->first();

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

    public function category()
    {
        //get most used category
        // $result = Category::select('id', 'title')->orderByDesc(
        //     DB::table('category_post')
        //         ->selectRaw('count(category_id) as category_count')
        //         ->whereColumn('categories.id', 'category_post.category_id')
        //         ->orderBy('category_count', 'desc')
        //         ->limit(1))->withCount('posts')->get();

        $result = Category::select('id', 'title')->withCount('posts')->orderByDesc('posts_count')->first();

        dump($result->toArray());
    }

    public function fulltextSearch()
    {
        $term = '+Voluptatibus -illo';
        // $result = Post::where('title', 'like', "%$term%")
        //     ->orWhere('content', 'like', "%$term%")
        //     ->get();

        $result = Post::whereRaw("MATCH(title, content) AGAINST(? IN BOOLEAN MODE)", [$term])->get();

        dump($result->toArray());
    }
}
