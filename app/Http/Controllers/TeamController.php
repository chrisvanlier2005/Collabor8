<?php

namespace App\Http\Controllers;

use App\Models\Team;
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
    public function show(Request $request, $id){
        $team = Team::with("users")->findOrFail($id);
        return Inertia::render("Teams/Show", [
            "team" => $team
        ]);
    }
}
