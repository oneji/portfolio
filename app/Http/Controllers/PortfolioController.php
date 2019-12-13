<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PortfolioItem;
use App\About;

class PortfolioController extends Controller
{
    public function get()
    {
        $portfolioItems = PortfolioItem::all();
        $about = About::first();
        return view('site.pages.portfolio', [
            'about' => $about,
            'portfolioItems' => $portfolioItems
        ]);
    }
}
