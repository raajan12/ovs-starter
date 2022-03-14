<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Position;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $elections = Election::all();
        $positions = Position::all();
        $candidates = Candidate::all();
        return view('admin.index', compact('elections', 'positions', 'candidates'));
    }
}
