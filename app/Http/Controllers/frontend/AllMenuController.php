<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AllMenuController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('frontend.pages.menu', [
            'categories' => $categories
        ]);
    }
}
