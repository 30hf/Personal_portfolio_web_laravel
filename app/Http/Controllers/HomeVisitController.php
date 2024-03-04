<?php

namespace App\Http\Controllers;

use App\Models\HomeVisit;
use Illuminate\Http\Request;

class HomeVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.visitor.home.index',[
            'data' => HomeVisit::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.visitor.home.create',[
            'data' => HomeVisit::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $data['image'] = $file->storeAs('admin-photo', $fileName, 'public');
        }
    
        HomeVisit::create($data);
        return  redirect()->back()->with('success', 'data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeVisit $homeVisit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeVisit $homeVisit)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $data = $request->all();

        if(!empty($data['image'])){
            $data['image'] = $request->file('image')->store('admin-photo', 'public');
        }else{
            unset($data['image']);
        }

        HomeVisit::findOrFail($id)->update($data);

        return  redirect()->back()->with('success', 'data Berhasil Ditambahkan');
    
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        HomeVisit::findOrFail($id)->delete();
        return  redirect()->back()->with('success', 'Kelas Berhasil Dihapus');
    }
}
