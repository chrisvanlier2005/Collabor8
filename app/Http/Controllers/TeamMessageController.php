<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamMessageController extends Controller
{
    //
    public function store(Request $request, $team_id){
        $request->validate([
            "message" => "required|string|max:255"
        ]);
        $team = Team::findOrFail($team_id);
        $team->message()->create([
            "message" => $request->message,
            "user_id" => Auth::user()->id
        ]);

        //broadcast(new TeamMessageSent(Auth::user(), $request->message, $team_id))->toOthers();

        return ["status" => "success"];
    }

    public function fetchMessages(Request $request, $team_id){
        return TeamMessage::where("team_id", $team_id)->with("user")->get();
    }

}
