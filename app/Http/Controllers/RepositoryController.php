<?php

namespace App\Http\Controllers;

use App\Services\GithubService;
use Inertia\Inertia;

class RepositoryController extends Controller
{
    public function index()
    {
        return Inertia::render("Repositories/RepositoriesIndex");
    }
    public function show($username, $repository_name){
        return Inertia::render("Repositories/Show", [
            "repository" => $repository_name,
            "username" => $username
        ]);
    }

}
