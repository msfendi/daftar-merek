<?php

namespace App\Livewire\CategoryBlog;

use Livewire\Component;
use App\Models\CategoryBlog;

class Create extends Component
{
    public $name;
    public function render()
    {
        return view('livewire.category-blog.create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);

        CategoryBlog::create([
            'name' => $this->name
        ]);

        session()->flash('success', 'Category Blog successfully created.');

        return redirect()->route('admin.category-blog.index');
    }
}
