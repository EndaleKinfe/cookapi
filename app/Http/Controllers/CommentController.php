<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    
    public function show(Comment $comment){
        return new CommentResource($comment);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {   
        Comment::create($request->validated());
        return response("created", 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());
        return response("created", 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response("Commnet ");
    }
}
