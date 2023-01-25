<?php

namespace App\Http\Controllers;

use App\Services\GithubService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RepositoryController extends Controller
{
    public function index(Request $request, GithubService $githubService)
    {
        return Inertia::render("Repositories/Index",
        [
            "username" => auth()->user()->name,
            "repositories" => Inertia::lazy(function() use ($githubService, $request){
                if($request->has("search")){
                    return $githubService->searchRepositoriesInUser(auth()->user()->name, $request->search)["items"];
                }
                return $githubService->getRepositoriesFromUser(auth()->user()->name);
            }),
            "search" => $request->search ?? ""
        ]);
    }
    public function all(Request $request, GithubService $githubService, $username){

        return Inertia::render("Repositories/All", [
            "username" => $username,
            "repositories" => Inertia::lazy(function() use ($username, $githubService, $request){
                if ($request->has("search")){
                    return $githubService->searchRepositoriesInUser($username, $request->search)["items"];
                }
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
