<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactMessage;

class ContactMessageController extends Controller
{
    public function get()
    {
        $contactMessages = ContactMessage::all();
        return view('admin.pages.contact', [
            'contactMessages' => $contactMessages
        ]);
    }

    public function deleteMessage($id)
    {
        $contactMessage = ContactMessage::find($id);
        $contactMessage->delete();

        return redirect()->route('admin.contact');
    }
}
