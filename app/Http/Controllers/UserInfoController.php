<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use App\Http\Requests\StoreUserInfoRequest;
use App\Http\Requests\UpdateUserInfoRequest;

class UserInfoController extends Controller
{
    
    public function store(StoreUserInfoRequest $request)
    {
        UserInfo::create($request->validated());
        return response("created", 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserInfoRequest $request, UserInfo $userInfo)
    {
        $userInfo($request->validated());
        return response("updated", 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserInfo $userInfo)
    {
        $userInfo->delete();
        return response("userinfo deleted", 200);
    }
}
