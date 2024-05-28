<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $featuredPost = Post::published()->featured()->latest('published_at')->get();
        $latestPost = Post::published()->latest('published_at')->get();
        return view('home', compact('featuredPost', 'latestPost'));
    }
}
