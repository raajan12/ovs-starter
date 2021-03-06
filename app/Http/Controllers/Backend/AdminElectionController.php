<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Election;
use Illuminate\Http\Request;

class AdminElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elections = Election::all();
        return view('admin.elections.index', compact('elections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.elections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'start' => 'required',
        ]);
        $date = date('d.m.Y H:i');
        $match_date = date('d.m.Y H:i', strtotime($data['start']));
        if ($date >= $match_date) {
            return redirect()->route('admin.elections.index')->with('error', 'Cannot set the election date for past');
        }
        Election::create($data);
        return redirect()->route('admin.elections.index')->with('success', 'Election Created Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function show(Election $election)
    {
        return view('admin.elections.show', compact('election'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function edit(Election $election)
    {
        return view('admin.elections.edit', compact('election'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Election $election)
    {
        $data = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'start' => 'required',
        ]);

        $election->update($data);
        return redirect()->route('admin.elections.index')->with('success', 'Election Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function destroy(Election $election)
    {
        $election->delete();
        $election->candidates()->delete();
        $election->votes()->delete();
        return redirect()->route('admin.elections.index')->with('success', 'Election Deleted Sucessfully');
    }
}
