<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $urls = \AshAllenDesign\ShortURL\Models\ShortURL::latest()->get();
        return view('dashboard', compact('urls'));
    }

    public function urlShorten(Request $request){

        $request->validate([
         'url' => "required|url"
        ]);

        $builder = new \AshAllenDesign\ShortURL\Classes\Builder();

        $shortURLObject = $builder->destinationUrl($request->url)->make();
        $shortURL = $shortURLObject->default_short_url;

        return back()->with('success','Your URL Shortened successfully, please check below!');
    }
}
