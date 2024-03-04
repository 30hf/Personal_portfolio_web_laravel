<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
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
           Experience::create($data);
           return  redirect()->back()->with('success', 'Kelas Berhasil Ditambahkan');
   }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
     {
            $data = $request->all();
            Experience::findOrFail($id)->update($data);
            return  redirect()->back()->with('success', 'Kelas Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
     {
        
            Experience::findOrFail($id)->delete();
            return  redirect()->back()->with('success', 'Kelas Berhasil Dihapus');
    }
}
