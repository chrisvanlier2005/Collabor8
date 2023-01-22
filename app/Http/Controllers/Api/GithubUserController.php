<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\GithubService;
use Illuminate\Http\Request;

class GithubUserController extends Controller
{
    public function index(Request $request, GithubService $githubService){
        abort_if(!$request->has("username"), 400, "Username is required");
        $usernameSearch = $request->input("username");
        $users = $githubService->getUsers($usernameSearch);
        return response()->json($users);
    }

    public function show(GithubService $githubService, $username){
        $user = $githubService->getUser($username);
        return response()->json($user);
    }
}
