<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Election;
use App\Models\Position;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function index()
    {
        $elections = Election::all();
        return view("home.index", compact('elections'));
    }
    public function voteByUser(Request $request)
    {

        if (!Hash::check($request->userpass, auth()->user()->password)) {
            return redirect()->back()->with('error', 'Incorrect Password, Authentication Failure');
        }
        if (Vote::where('user_id', auth()->user()->id)->where('position_id', $request->position_id)->where('election_id', $request->election_id)->count() != 0) {
            return redirect()->back()->with('error', 'You have already voted for that position');
        }
        $vote = new Vote;
        $vote->candidate_id = $request->candidate_id;
        $vote->election_id = $request->election_id;
        $vote->position_id = $request->position_id;
        $vote->user_id = auth()->user()->id;
        $vote->save();
        return redirect()->back()->with('success', 'Voted Successfully');
    }
    public function showElection(Election $election)
    {

        return view('home.showElection', compact('election'));
    }
    public function myvotes()
    {
        $votes = auth()->user()->votes;
        return view('home.myvotes', compact('votes'));
    }
    public function results()
    {
        $endedelec = Election::where('status', '1')->get();
        foreach ($endedelec as $election) {

            foreach ($election->candidates->groupBy('position_id') as $position => $candidates) {

                $pname = Position::find($position);
                echo "<br>";
                echo $pname->name;
                echo "<br>";
                foreach ($candidates as $candidate) {
                    echo $candidate->name . ", id:" . $candidate->id;
                    echo  ", Votes: ";

                    echo $candidate->votes->where('election_id', $election->id)->count();
                    echo "<br>";
                }
            }
        }
        dd($endedelec);
    }
}
