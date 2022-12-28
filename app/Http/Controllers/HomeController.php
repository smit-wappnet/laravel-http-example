<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $
        if ($request->get('search')) {
            $URL = "https://newsapi.org/v2/everything?q=" . $request->get('search') . "&apiKey=" . env('NEWSAPI_KEY');
            $response = Http::get($URL)->throw()->json();
            $articles = $response['articles'];
            $data = compact('articles');
        } else {
            $data = [];
        }
        return view('welcome', $data);
    }
}
