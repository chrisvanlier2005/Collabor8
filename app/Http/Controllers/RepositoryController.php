<?php

namespace App\Http\Controllers;

use App\Services\GithubService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RepositoryController extends Controller
{
    public function index()
    {
        return Inertia::render("Repositories/RepositoriesIndex");
    }
    public function all($username){
        return Inertia::render("Repositories/All", [
            "username" => $username
        ]);
    }
    public function show(Request $request, $username, $repository_name){
        return Inertia::render("Repositories/Show", [
            "repository" => $repository_name,
            "username" => $username,
            "path" => $request->path ?? ""
        ]);
    }

}
