<?php

namespace App\Livewire;

use App\Models\Comment as ModelsComment;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Comment extends Component
{
    use WithPagination;

    public Post $post;

    #[Rule('required')]
    public $content = '';

    public function addComment()
    {
        $this->validateOnly('content');
        $this->post->comments()->create([
            'user_id' => auth()->user()->id,
            'content' => $this->content
        ]);
        $this->reset('content');
    }

    #[Computed()]
    public function getComments()
    {
        return $this?->post?->comments()->latest()->paginate(2);
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
