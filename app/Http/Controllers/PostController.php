<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Website $website
     * @return \Illuminate\Http\Response
     */
    public function index(Website $website)
    {
        $posts = $website->posts()->paginate();

        return response()->json([
            'status' => true,
            'message' => 'Posts fetched successfully.',
            'data' => [
                'posts' => $posts,
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorePostRequest $request
     * @param Website $website
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request, Website $website)
    {
        $post = new Post();
        $post->website()->associate($website);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return response()->json([
            'status' => true,
            'message' => 'Post Has Been created successfully.',
            'data' => [
                'post' => $post,
            ],
        ]);
    }


}
