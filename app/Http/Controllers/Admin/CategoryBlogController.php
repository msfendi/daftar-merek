<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;

class CategoryBlogController extends Controller
{
    public function index()
    {
        return view('admin.category-blog.index');
    }

    public function create()
    {
        return view('admin.category-blog.create');
    }

    public function edit($id)
    {
        $categoryBlog = CategoryBlog::findOrFail($id);
        return view('admin.category-blog.edit', [
            'categoryBlog' => $categoryBlog
        ]);
    }
}
