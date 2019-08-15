<?php

namespace App\Http\Controllers;
use App\About;
use App\Education;
use App\Experience;
use App\Skill;

use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function getResume()
    {
        dd(request()->getScheme());
        
        $about = About::first();
        $education = Education::getInfo();
        $experience = Experience::orderBy('id', 'desc')->get();
        $skills = Skill::all();
        
        return view('site.pages.resume', [ 
            'about' => $about,
            'education' => $education,
            'experience' => $experience,
            'skills' => $skills
        ]);
    }
}
