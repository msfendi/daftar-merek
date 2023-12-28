<?php

namespace App\Livewire\CategoryBlog;

use Livewire\Component;

class Edit extends Component
{
    public $categoryBlogId;
    public $name;

    public function render()
    {
        return view('livewire.category-blog.edit');
    }

    public function mount($categoryBlog)
    {
        $this->categoryBlogId = $categoryBlog->id;
        $this->name = $categoryBlog->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3'
        ]);

        $categoryBlog = \App\Models\CategoryBlog::findOrFail($this->categoryBlogId);
        $categoryBlog->update([
            'name' => $this->name
        ]);

        session()->flash('success', 'Category blog berhasil diupdate');
        return redirect()->route('admin.category-blog.index');
    }
}
