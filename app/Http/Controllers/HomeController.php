<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\HomeVisit;
use App\Models\Languages;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }


    public function resume() {
        return view('pages.visitor.resume.index',[
            'pengalaman'=>Experience::all(),
            'pendidikan'=>Education::all(),
            'skill'=>Skill::all(),
            'bahasa'=>Languages::all(),
            
     ]);
    }

    public function project()
    {
        return view('pages.visitor.projects.index',[
            'project' => Project::all()
        ]);
    }
    public function homevisit()
    {
        return view('pages.visitor.home.index',[
            'data' => HomeVisit::all()
        ]);
    }
}
