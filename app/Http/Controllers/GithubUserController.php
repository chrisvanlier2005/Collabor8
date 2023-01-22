<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class GithubUserController extends Controller
{
    //
    public function index(){

    }
    public function show($username) {
        return Inertia::render("User/Show", [
            "username" => $username
        ]);
    }
}
