<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\PortfolioItem;

class PortfolioController extends Controller
{
    public function get()
    {
        $portfolioItems = PortfolioItem::all();
        return view('admin.pages.portfolio.index', [
            'portfolioItems' => $portfolioItems
        ]);
    }

    public function save(Request $request)
    {
        // Upload screenshots
        if($request->hasFile('files')) {
            $screenshotsNamesToStore = [];
            $screenshots = $request->file('files');
            foreach ($screenshots as $screenshot) {
                $screenshotsNamesToStore[] = PortfolioItem::uploadScreenshots($screenshot);
            }
        }
        
        // Validate input data
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
        ]);

        if($request->hasFile('cover_image')) {            
            $fileNameToStore = time().'.'.$request->cover_image->getClientOriginalExtension();
            $fileNameToStore = $request->cover_image->store('uploads/portfolio', ['disk' => 'my_files']);
        } else {
            $fileNameToStore = null;
        }

        $portfolioItem = new PortfolioItem($request->toArray());
        $portfolioItem->cover_image = $fileNameToStore;
        $portfolioItem->screenshots = json_encode($screenshotsNamesToStore);
        $portfolioItem->slug = str_slug($request->title, '-');
        $portfolioItem->save();
        
        // Put the message in session
        $request->session()->flash('success', 'Information has been successfully saved.');

        return redirect()->route('admin.portfolio');
    }

    public function edit($id)
    {
        $portfolioItem = PortfolioItem::find($id);
        return view('admin.pages.portfolio.edit', [
            'portfolioItem' => $portfolioItem
        ]);
    }

    public function update($id, Request $request)
    {
        // Find the portfolio item by ID
        $portfolioItem = PortfolioItem::find($id);

        // Check if the item has screenshots
        if($portfolioItem['screenshots'] !== null) {
            $screenshotsNamesToStore = json_decode($portfolioItem['screenshots']);
        } else {
            $screenshotsNamesToStore = [];
        }

        // Upload screenshots
        if($request->hasFile('files')) {
            $screenshots = $request->file('files');
            foreach ($screenshots as $screenshot) {
                $screenshotsNamesToStore[] = PortfolioItem::uploadScreenshots($screenshot);
            }
        }

        // Validate input data
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
        ]);

        // Upload cover image and delete the old one
        if($request->hasFile('cover_image')) {            
            $fileNameToStore = time().'.'.$request->cover_image->getClientOriginalExtension();
            $fileNameToStore = $request->cover_image->store('uploads/portfolio', ['disk' => 'my_files']);
            // Delete the old cover image
            Storage::disk('my_files')->delete($portfolioItem['cover_image']);
            $portfolioItem->cover_image = $fileNameToStore;
        }

        // Update the item
        $portfolioItem->title = $request->title;
        $portfolioItem->subtitle = $request->subtitle;
        $portfolioItem->description = $request->description;
        $portfolioItem->link = $request->link;
        $portfolioItem->screenshots = json_encode($screenshotsNamesToStore);
        $portfolioItem->slug = str_slug($request->title, '-');
        $portfolioItem->save();
        
        // Put the message in session
        $request->session()->flash('success', 'Information has been successfully updated.');

        return redirect()->route('admin.portfolio.item', [ 'id' => $portfolioItem['id'] ]);
    }

    public function deleteScreenshot($id, $screenshotId, Request $request)
    {
        $portfolioItem = PortfolioItem::find($id);
        $portfolioItemScreenshots = json_decode($portfolioItem['screenshots']);

        foreach($portfolioItemScreenshots as $index => $screenshot) {
            if($screenshot->id === $screenshotId) {
                // Delete screenshot from a folder
                Storage::disk('my_files')->delete($screenshot->link);
                // Delete screenshot from DB
                unset($portfolioItemScreenshots[$index]);
            }
        }

        $portfolioItem['screenshots'] = json_encode($portfolioItemScreenshots);
        $portfolioItem->save();

        // Put the message in session
        $request->session()->flash('success', 'Screenshot has been successfully deleted.');

        return redirect()->route('admin.portfolio.item', [ 'id' => $id ]);
    }
}
