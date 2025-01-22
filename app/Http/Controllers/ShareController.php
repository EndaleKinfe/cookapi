<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Http\Requests\StoreShareRequest;
use App\Http\Requests\UpdateShareRequest;

class ShareController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShareRequest $request)
    {
        Share::create($request->validated());
        return response("created", 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShareRequest $request, Share $share)
    {
        $share($request->validated());
        return response("updated", 201);
    }

}
