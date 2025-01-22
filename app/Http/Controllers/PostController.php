<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $includeDetails = request()->query("details");
        if ($includeDetails) {
            return new PostResource(Post::all()->paginate()->when("ingredients", "comments", "instructions"));
        }
        return new PostCollection(Post::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        return new PostResource(Post::create($request->validated()));
    }

    public function show(Post $post){
    
        return new PostResource($post->loadMissing("ingredients","comments","instructions"));
        

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        return new PostResource($post->update($request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response("", 204);
    }
}
