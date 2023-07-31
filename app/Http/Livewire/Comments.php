<?php

namespace App\Http\Livewire;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Comments extends Component
{
    public $comments;
    public $blog;
    public $comment = '';

    public function mount()
    {
        $this->comments = Comment::where('blog_id', $this->blog->id)->get();
    }

    public function comment()
    {
        //dd($this->comment);

        $comment = new Comment();

        $comment->comment = $this->comment;

        $comment->user_id = Auth::user()->id;

        $comment->blog_id = $this->blog->id;

        $comment->save();

        $this->comment = '';

        $this->comments = Comment::where('blog_id', $this->blog->id)->get();
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
