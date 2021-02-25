<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Post;

class BlogController extends Controller
{
    public function show($slug) {

        $post = Post::all()->where('slug', $slug)->first();

        $now = new Carbon();
        dump($now->toDateString());


        return view('post', compact('post'));
    }
}
