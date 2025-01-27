<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;

class ImageController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        Image::create($request->all());
        return response("created", 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        $image->update($request->validated());
        return response("update", 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        $image->delete();
        return response("image deleted", 200);
    }
}
