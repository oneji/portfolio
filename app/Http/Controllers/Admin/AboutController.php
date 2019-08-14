<?php

namespace App\Http\Controllers\Admin;
use App\About;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Skill;

class AboutController extends Controller
{
    public function get() 
    {
        $about = About::first();
        $skills = Skill::all();
        return view('admin.pages.about', [ 'about' => $about, 'skills' => $skills ]);
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);        

        $about = About::first();

        if($about !== null) {
            $about->fill($request->toArray());
        } else {
            $about = new About($request->toArray());
        }

        // User's photo manipulations
        if($about->photo === null || $request->photo !== null) {
            // Uploading photo
            if($request->hasFile('photo')) {
                $fileNameToStore = About::uploadPhoto($request->photo);
                Storage::disk('my_files')->delete($about->photo);
            } else {
                $fileNameToStore = null;
            }

            $about->photo = $fileNameToStore;            
        }

        $about->save();
        
        // Put the message in session
        $request->session()->flash('success', 'Information has been successfully saved.');

        return redirect()->route('admin.about');
    }

    public function uploadCV(Request $request)
    {
        $about = About::first();
        if($about !== null) {

            if($request->hasFile('cv')) {
                Storage::disk('my_files')->delete($about->cv);
                
                $path = $request->cv->storeAs(
                    'uploads', 
                    'CV_Kamilov_Temur.'.$request->cv->getClientOriginalExtension(), 
                    ['disk' => 'my_files']
                );


                $about->cv = $path;
                $about->save();

                return redirect()->route('admin.about');
            } else {

            }
        }
    }

    public function downloadCV()
    {
        $about = About::first();

        return Storage::disk('my_files')->download($about->cv);        
    }
}
