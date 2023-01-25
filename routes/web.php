<?php

use App\Http\Controllers\GithubUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\TeamController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn() => Inertia::render('Index'));

Route::group(["middleware" => "auth", "prefix" => "/dashboard"], function () {
    Route::get('/', fn() => Inertia::render('Dashboard'))->name('dashboard');
});


Route::group(["prefix" => "teams", "middleware" => "auth"], function () {
    Route::get('/', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/{id}', [TeamController::class, 'show'])->name('teams.show');
    Route::get('/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/', [TeamController::class, 'store'])->name('teams.store');
    Route::put('/{id}', [TeamController::class, 'update'])->name('teams.update');
});


Route::group(["middleware" => "auth", "prefix" => "/github"], function (){
    Route::prefix('/repositories')->group(function () {
        Route::get('/', [RepositoryController::class, 'index'])->name('repositories.index');
        Route::get('/{username}', [RepositoryController::class, 'all'])->name('repositories.all');
        Route::get('/{username}/{repository_name}', [RepositoryController::class, 'show'])->name('repositories.show');
    });
    Route::prefix('/users')->group(function () {
        Route::get('/', [GithubUserController::class, 'index'])->name('users.index');
        Route::get('/{username}', [GithubUserController::class, 'show'])->name('users.show');
    });
    Route::prefix("/teams")->group(function () {
        //Route::get('/', fn() => Inertia::render('Teams/Index'))->name('teams.index');
    });

    Route::prefix('/reload')->group(function () {
        // reloading / recaching of data
    });
});







// PHP BREEZE ROUTES DEFAULT

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
