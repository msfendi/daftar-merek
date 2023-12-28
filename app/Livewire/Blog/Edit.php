<?php

namespace App\Livewire\Blog;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Models\CategoryBlog;

class Edit extends Component
{
    use WithFileUploads;
    public $blogId;
    public $title;
    public $slug;
    public $content;
    public $author;
    public $category_blog_id;
    public $image;
    public $oldImage;

    public function render()
    {
        $categoryBlogs = CategoryBlog::all();
        return view('livewire.blog.edit', [
            'categoryBlogs' => $categoryBlogs
        ]);
    }

    public function mount($blog)
    {
        $this->blogId = $blog->id;
        $this->title = $blog->title;
        $this->slug = $blog->slug;
        $this->content = $blog->content;
        $user = auth()->user()->name;
        $this->author = $user;
        $this->category_blog_id = $blog->category_id;
        $this->oldImage = $blog->image ? $blog->image : null;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
            'category_blog_id' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $data = [
            'title' => $this->title,
            'content' => $this->content,
            'published_at' => now(),
            'author_id' => auth()->user()->id,
            'category_id' => $this->category_blog_id
        ];

        if ($this->image) {
            // File::delete(public_path('storage/blog/' . $this->oldImage));
            $imageName = microtime() . '.' . $this->image->extension();
            $this->image->storeAs('blog', $imageName, 'public');
            $data['image'] = $imageName;
        } else {
            $data['image'] = $this->oldImage;
        }

        $blog = \App\Models\Blog::findOrFail($this->blogId);
        $blog->update($data);

        session()->flash('success', 'Blog berhasil diupdate');
        return redirect()->route('admin.blog.index');
    }
}
