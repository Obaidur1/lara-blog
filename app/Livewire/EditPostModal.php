<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Category;
use LivewireUI\Modal\ModalComponent;
use PhpParser\Node\Stmt\TryCatch;

class EditPostModal extends ModalComponent
{
    public $blog;
    public $categories;
    public function mount($id)
    {
        $this->blog = Blog::findOrFail($id)->toArray();

        $this->categories = Category::all();
    }

    public function updateBlog()
    {
        $this->closeModal();
    }
    public function deleteBlog()
    {
        try {
            $blog = Blog::findOrFail($this->blog['id']);
            $blog->delete();
            $this->closeModal();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.edit-post-modal');
    }
}
