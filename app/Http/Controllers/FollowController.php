<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Http\Requests\StoreFollowRequest;
use App\Http\Requests\UpdateFollowRequest;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFollowRequest $request)
    {
        //
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFollowRequest $request, Follow $follow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Follow $follow)
    {
        //
    }
}
