<?php

use App\Http\Controllers\Api\GithubUserController;
use App\Http\Controllers\Api\RepositoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix("/repositories/{username}")->group(function () {
    Route::get("/", [RepositoryController::class, "index"])->name("repositories.index");
    Route::get("/{repository_name}", [RepositoryController::class, "show"])->name("repositories.show");
    Route::get("/{repository_name}/contents", [RepositoryController::class, "content"])->name("repositories.content");
});
Route::prefix("/github")->group(function() {
   Route::prefix("/users")->group(function() {
      Route::get("/", [GithubUserController::class, "index"])->name("github.users.index");
        Route::get("/{username}", [GithubUserController::class, "show"])->name("github.users.show");

   });
});
