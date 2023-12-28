<?php

namespace App\Livewire\Blog;

use App\Models\Blog;
use App\Models\CategoryBlog;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Str;


// TODO: PERBAIKI WIRE MODEL DEFER UNTUK SLUG

class Create extends Component
{
    use WithFileUploads;
    public $title;
    public $slug;
    public $content;
    public $author;
    public $category_blog_id;
    public $image;

    public function render()
    {
        $categoryBlogs = CategoryBlog::all();
        return view('livewire.blog.create', [
            'categoryBlogs' => $categoryBlogs
        ]);
    }

    public function mount()
    {
        $user = auth()->user()->name;
        $this->author = $user;
    }

    public function updated()
    {
        $this->slug = $this->title;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'category_blog_id' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $imageName = microtime() . '.' . $this->image->extension();
        $this->image->storeAs('blog', $imageName, 'public');

        $data = [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'published_at' => now(),
            'author_id' => auth()->user()->id,
            'category_id' => $this->category_blog_id,
            'image' => $imageName,
        ];
        Blog::create($data);

        session()->flash('success', 'Blog berhasil ditambahkan');
        return redirect()->route('admin.blog.index');
    }
}
