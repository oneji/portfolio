<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Education;
use App\Experience;
use App\ContactMessage;
use App\PortfolioItem;
use App\Skill;

class HomeController extends Controller
{
    public function get()
    {
        $widgets = [
            'Education items' => Education::get()->count(),
            'Experience items' => Experience::get()->count(),
            'Contact messages' => ContactMessage::get()->count(),
            'Portfolio items' => PortfolioItem::get()->count(),
            'Skills number' => Skill::get()->count()
        ];

        return view('admin.pages.home', [
            'widgets' => $widgets
        ]);
    }
}
