<?php

namespace App\Http\Controllers\Admin;
use App\About;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function get() 
    {
        $about = About::first();
        return view('admin.pages.about', [ 'about' => $about ]);
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
}
