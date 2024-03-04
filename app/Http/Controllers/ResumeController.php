<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Languages;
use App\Models\Resume;
use App\Models\Skill;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.visitor.resume.index',[
            'pengalaman'=>Experience::all(),
            'pendidikan'=>Education::all(),
            'skill'=>Skill::all(),
            'bahasa'=>Languages::all(),
            
     ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.visitor.resume.create',[
                'pengalaman'=>Experience::all(),
                'pendidikan'=>Education::all(),
                'skill'=>Skill::all(),
                'bahasa'=>Languages::all(),
                
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Resume $resume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resume $resume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resume $resume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resume $resume)
    {
        //
    }
}
