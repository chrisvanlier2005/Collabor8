<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepositoryController;
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
Route::middleware(["auth"])->group(function (){
    Route::prefix('/repositories')->group(function () {
        Route::get('/', [RepositoryController::class, 'index'])->name('repositories.index');
        Route::get('/{username}', [RepositoryController::class, 'all'])->name('repositories.all');
        Route::get('/{username}/{repository_name}', [RepositoryController::class, 'show'])->name('repositories.show');
    });
    Route::prefix('/users')->group(function () {

    });

});







// PHP BREEZE ROUTES DEFAULT
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
