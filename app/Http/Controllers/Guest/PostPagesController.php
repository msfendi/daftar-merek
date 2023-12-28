<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class PostPagesController extends Controller
{
    public function show($slug)
    {
        $singlePost = Blog::where('slug', $slug)->firstOrFail();
        // dd($singlePost);
        return view('guest.postPages.index', compact('singlePost'));
    }

    public function defaultImage($image)
    {
        if (file_exists(public_path('storage/blog/' . $image))) {
            return asset('storage/blog/' . $image);
        }
    }
}
