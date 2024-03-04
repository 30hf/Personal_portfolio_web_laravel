<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.visitor.projects.index',[
            'project' => Project::all()
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.visitor.projects.create',[
            'project'=> Project::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
    
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName();
            $data['img'] = $file->storeAs('project-photo', $fileName, 'public');
        }
    
        Project::create($data);
        return  redirect()->back()->with('success', 'data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $data = $request->all();

        if(!empty($data['img'])){
            $data['img'] = $request->file('img')->store('project-photo', 'public');
        }else{
            unset($data['img']);
        }

        Project::findOrFail($id)->update($data);

        return  redirect()->back()->with('success', 'data Berhasil Ditambahkan');
    
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Project::findOrFail($id)->delete();
        return  redirect()->back()->with('success', 'Kelas Berhasil Dihapus');
    }
}
