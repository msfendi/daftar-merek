<?php

namespace App\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;

class Index extends Component
{
    public function defaultImage($image)
    {
        if (file_exists(public_path('storage/blog/' . $image))) {
            return asset('storage/blog/' . $image);
        } else {
            // return asset('assets/default/images/room-type.jpg');
        }
    }

    public function render()
    {
        return view('livewire.blog.index', [
            'blogs' => Blog::all()
        ]);
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        session()->flash('success', 'Blog berhasil dihapus');
        return redirect()->route('admin.blog.index');
    }
}
