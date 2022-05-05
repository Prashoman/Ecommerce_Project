<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::all();

        $top_categories = Category::where('is_top_category', 'yes')->get();
        $sliders = Slider::all();
        return view('frontend.index', compact('categories', 'top_categories', 'sliders'));
    }
    public function about(){
        $categories = Category::all();
        return view('frontend.about',compact('categories'));
    }

}
