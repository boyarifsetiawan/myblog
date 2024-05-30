<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ButtonLike extends Component
{
    public Post $post;

    public function toggleLike()
    {
        if (!Auth::check()) {
            return $this->redirect('login', true);
        }
        $user = Auth::user();

        if ($user->hasLiked($this->post)) {
            $user->likes()->detach($this->post);
            return;
        }
        $user->likes()->attach($this->post);
    }

    public function render()
    {
        return view('livewire.button-like');
    }
}
