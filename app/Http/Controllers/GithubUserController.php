<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class GithubUserController extends Controller
{
    //
    public function index(Request $request){
        return Inertia::render("Users/Index", [
            "username" => $request->input("username") ?? ""
        ]);

    }
    public function show($username) {
        return Inertia::render("Users/Show", [
            "username" => $username
        ]);
    }
}
