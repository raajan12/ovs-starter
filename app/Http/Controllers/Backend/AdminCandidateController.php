<?php

namespace App\Http\Controllers\Backend;

use App\Models\Election;
use App\Models\Position;
use App\Models\Candidate;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Services\MediaService;
use App\Http\Controllers\Controller;

class AdminCandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all();
        return view("admin.candidates.index", compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $elections = Election::all();
        $positions = Position::all();
        return view("admin.candidates.create", compact('elections', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate(
            [
                'name' => ['required', 'max:100'],
                'description' => ['required'],
                'election_id' => ['required'],
                'position_id' => ['required'],
            ]
        );

        if ($request->hasFile('image')) {
            $data["media_id"] = MediaService::upload($request->file('image'));
        } else {
            unset($data["image"]);
        }

        Candidate::create($data);

        return redirect()->route('admin.candidates.index')->with('success', 'Candidate Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {

        $elections = Election::all();
        $positions = Position::all();
        return view("admin.candidates.edit", compact('elections', 'positions', 'candidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        $data = $request->validate([
            'name' => 'required',
            'election_id' => 'required',
            'position_id' => 'required',
            'description' => 'required',
        ]);
        $candidate->update($data);
        return redirect()->route('admin.candidates.index')->with('success', 'Candidate Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {

        $candidate->delete();
        return redirect()->route('admin.candidates.index')->with('success', 'Candidate Deleted');
    }
}
