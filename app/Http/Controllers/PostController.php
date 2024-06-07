<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return PostResource::collection(Post::paginate($request->limit));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return PostResource
     */
    public function store(StorePostRequest $request): PostResource
    {
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'likes' => 0,
            'dislikes' => 0,
            'views' => 0,
        ]);

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return PostResource
     */
    public function show(Post $post): PostResource
    {
        $post->update([
            'views' =>  $post->views + 1,
        ]);

        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return PostResource
     */
    public function update(Request $request, Post $post): PostResource
    {
        $post->update([
            'title' => $request->title | $post->title,
            'content' => $request->content | $post->content,
            'likes' => $request->likes | $post->likes,
            'dislikes' => $request->dislikes | $post->dislikes,
            'views' => $request->views | $post->views,
        ]);

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return bool
     */
    public function destroy(Post $post): bool
    {
        return $post->delete();
    }
}
