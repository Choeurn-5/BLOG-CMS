<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostComponent extends Component
{
    public $title, $content;

public function createPost()
{
    $this->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    Post::create([
        'title' => $this->title,
        'content' => $this->content,
        'user_id' => auth()->id(),
    ]);

    session()->flash('message', 'Post created successfully.');
    $this->reset(['title', 'content']);
}

    public function render()
    {
        return view('livewire.post-component');
    }

    
}
