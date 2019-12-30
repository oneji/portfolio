<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\ContactMessage;

class ContactController extends Controller
{
    public function get()
    {
        $about = About::first();
        return view('site.pages.contact', [
            'about' => $about
        ]);
    }

    public function saveContactMessage(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $contactMessage = new ContactMessage($request->toArray());
        $contactMessage->save();

        // Put the message in session
        $request->session()->flash('success', 'Your message has been successfully sent.');
        
        return redirect()->route('site.contact');
    }
}
