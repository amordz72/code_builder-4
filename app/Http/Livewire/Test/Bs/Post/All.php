<?php

namespace App\Http\Livewire\Test\Bs\Post;

use App\Models\Post;
use Livewire\Component;
//use Livewire\WithPagination;

class All extends Component
{
    // use WithPagination;

    public function render()
    {
        $posts=Post::paginate(5);
        return view('livewire.test.bs.post.all',[
            'posts'=>$posts,
        ])->extends('layouts.bs');
    }
}
