<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PortfolioItem;

class PortfolioController extends Controller
{
    public function get()
    {
        $portfolioItems = PortfolioItem::all();
        return view('admin.pages.portfolio', [
            'portfolioItems' => $portfolioItems
        ]);
    }

    public function save(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
        ]);

        if($request->hasFile('cover_image')) {            
            $fileNameToStore = time().'.'.$request->cover_image->getClientOriginalExtension();
            $fileNameToStore = $request->cover_image->store('uploads', ['disk' => 'my_files']);
        } else {
            $fileNameToStore = null;
        }

        $portfolioItem = new PortfolioItem($request->toArray());
        $portfolioItem->cover_image = $fileNameToStore;
        $portfolioItem->save();
        
        // Put the message in session
        $request->session()->flash('success', 'Information has been successfully saved.');

        return redirect()->route('admin.portfolio');
    }
}
