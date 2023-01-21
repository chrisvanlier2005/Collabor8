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
}
