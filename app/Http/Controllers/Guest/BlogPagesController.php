<?php

namespace App\Http\Controllers\Guest;

use App\Models\Blog as ModelsBlog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogPagesController extends Controller
{
    public function index()
    {
        $blogs = ModelsBlog::all();
        return view('guest.blogPages.index', [
            'blogs' => $blogs
        ]);
    }

    public static function defaultImage($image)
    {
        if (file_exists(public_path('storage/blog/' . $image))) {
            return asset('storage/blog/' . $image);
        } else {
            // return asset('assets/default/images/room-type.jpg');
        }
    }
}
