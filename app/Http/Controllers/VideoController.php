<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Http\Resources\VideoResource;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return VideoResource::collection(Video::all());
    }


    public function show(Video $video){
        return new VideoResource($video->loadMissing("comments"));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideoRequest $request)
    {
        return new VideoResource(Video::create($request->validated()));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        return new VideoResource($video->update($request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return response("", 204);
    }
}
