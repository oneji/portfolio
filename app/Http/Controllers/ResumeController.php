<?php

namespace App\Http\Controllers;
use App\About;
use App\Education;
use App\Experience;

use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function getResume()
    {
        $about = About::first();
        $education = Education::getInfo();
        $experience = Experience::orderBy('id', 'desc')->get();
        
        return view('site.pages.resume', [ 
            'about' => $about,
            'education' => $education,
            'experience' => $experience
        ]);
    }
}
