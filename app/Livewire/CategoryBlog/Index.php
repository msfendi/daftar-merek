<?php

namespace App\Livewire\CategoryBlog;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.category-blog.index', [
            'categoryBlogs' =>  \App\Models\CategoryBlog::all()
        ]);
    }

    public function destroy($id)
    {
        $categoryBlog = \App\Models\CategoryBlog::findOrFail($id);
        $categoryBlog->delete();

        session()->flash('success', 'Category blog berhasil dihapus');
        return redirect()->route('admin.category-blog.index');
    }
}
