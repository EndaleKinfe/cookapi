<?php

namespace App\Http\Controllers;

use App\Models\FrendRequest;
use App\Http\Requests\StoreFrendRequestRequest;
use App\Http\Requests\UpdateFrendRequestRequest;
use App\Http\Resources\FrendRequestResource;
use App\Models\User;

class FrendRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return FrendRequestResource::collection(FrendRequest::whereUser($user));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFrendRequestRequest $request)
    {
        FrendRequest::create($request->all());
        return response("created", 201);
    }

  

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFrendRequestRequest $request, FrendRequest $frendRequest)
    {
        $frendRequest->update($request->validated());
        return response("updated", 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FrendRequest $frendRequest)
    {
        $frendRequest->delete();
        return response("freind request canceled");
    }
}
