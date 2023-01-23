<?php

namespace App\Http\Controllers;

use App\Services\GithubService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RepositoryController extends Controller
{
    public function index(GithubService $githubService)
    {
        return Inertia::render("Repositories/Index",
        [
            "username" => auth()->user()->name,
            "repositories" => Inertia::lazy(function() use ($githubService){
                return $githubService->getRepositoriesFromUser(auth()->user()->name);
            })
        ]);
    }
    public function all(GithubService $githubService, $username){
        return Inertia::render("Repositories/All", [
            "username" => $username,
            "repositories" => Inertia::lazy(function() use ($username, $githubService){
                return $githubService->getRepositoriesFromUser($username);
            })
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
