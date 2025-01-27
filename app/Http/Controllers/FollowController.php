<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Http\Requests\StoreFollowRequest;
use App\Http\Requests\UpdateFollowRequest;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->user()->follows();
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFollowRequest $request)
    {
        Follow::create($request->all());
        return response("created", 201);
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
        $follow->delete();
        return response('', 204);
    }
}
