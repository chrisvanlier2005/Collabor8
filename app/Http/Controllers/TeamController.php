<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeamController extends Controller
{
    //
    public function index(Request $request){
        $teams = Auth::user()->teams;
        return Inertia::render("Teams/Index",
        [
            "teams" => $teams
        ]);
    }
}
