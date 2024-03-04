<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $data = $request->all();
           Skill::create($data);
           return  redirect()->back()->with('success', 'Kelas Berhasil Ditambahkan');
   }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
           $data = $request->all();
           Skill::findOrFail($id)->update($data);
           return  redirect()->back()->with('success', 'Kelas Berhasil Diedit');
   }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
       
           Skill::findOrFail($id)->delete();
           return  redirect()->back()->with('success', 'Kelas Berhasil Dihapus');
   }
}
