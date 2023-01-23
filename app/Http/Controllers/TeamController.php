<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class TeamController extends Controller
{
    //
    public function index(Request $request){

        return Inertia::render("Teams/Index");
    }
}
