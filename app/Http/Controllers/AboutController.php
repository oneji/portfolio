<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
    public function get()
    {
        $about = About::first();

        return view('site.pages.about', [ 'about' => $about ]);
    }
}
