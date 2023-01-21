<?php

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
    Route::get("/{repository_name}/contents", [RepositoryController::class, "contents"])->name("repositories.contents");
    Route::get("/{repository_name}/contents/{path}", [RepositoryController::class, "content"])->name("repositories.content");
});
