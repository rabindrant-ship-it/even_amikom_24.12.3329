<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Partner;

class HomeController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();

        $categories = Category::latest()->get();

        $events = Event::latest()->get();

        return view('welcome', compact(
            'partners',
            'categories',
            'events'
        ));
    }
}
