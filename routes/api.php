<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\FrendRequestController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\VideoController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/user', function (Request $request) {
        return $request->user()->loadMissing("userInfo");
    });

    Route::apiResource("/posts", PostController::class);
    Route::apiResource("/videos", VideoController::class);
    Route::apiResource("/reports", ReportController::class);
    Route::apiResource("/messages", MessageController::class);
    Route::apiResource("/friends", FrendRequestController::class);
    Route::apiResource("/follows", FollowController::class);
    Route::apiResource("/images", ImageController::class);
    Route::apiResource("/instructions", InstructionController::class);
    Route::apiResource("/ingredients", IngredientController::class);
    Route::apiResource("/likes", LikeController::class);
    Route::apiResource("/userinfo", UserInfoController::class);
    Route::apiResource("/shares", ShareController::class);
    Route::apiResource("/comments", CommentController::class);
    Route::post("/logout", [AuthController::class, "logout"]);
});

Route::post("/login", [AuthController::class, "login"]);
Route::post("/signup", [AuthController::class, "signup"]);





