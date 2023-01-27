<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\GithubService;
use Illuminate\Http\Request;

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

    public function content(Request $request, GithubService $githubService, $username, $repository_name){
        abort_if(!$request->has("path"), 400, "Path is required");
        $content = $githubService->getContentFromRepository($username, $repository_name, $request->path);
        return response()->json($content);
    }
}
