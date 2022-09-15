<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Menu::latest()->limit(3)->get();
        $categories = Category::get();
        return view('frontend.pages.home', [
            'sliders' => $sliders,
            'categories' => $categories
        ]);
    }
}
