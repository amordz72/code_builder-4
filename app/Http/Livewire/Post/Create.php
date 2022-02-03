<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
class Create extends Component
{
    public function render()
    {
        return view('livewire.post.create');
    }

    public  $post;
    protected $rules = [
        'name' => 'required|string|min:0|max:255',
        'title' => 'required|string|min:0|max:255',

    ];

    public function save()
    {
        $this->validate();

        $this->post->save();
    }
}
