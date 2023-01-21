<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\GithubService;

class RepositoryController extends Controller
{
    public function index(GithubService $githubService, $username) {
        $repositories = $githubService->getRepositoriesFromUser($username);
        $message = $repositories["message"] ?? null;
        if ($message) $repositories = [];
        return response()->json($repositories);
    }

    public function show(GithubService $githubService, $username, $repository_name) {
        $repository = $githubService->getRepositoryFromUser("chrisvanlier2005", $repository_name);
        return response()->json($repository);
    }

    public function contents(GithubService $githubService, $username, $repository_name){
        $contents = $githubService->getContentsFromRepository($username, $repository_name);
        return response()->json($contents);
    }


}
