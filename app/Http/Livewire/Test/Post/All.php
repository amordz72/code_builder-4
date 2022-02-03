<?php

namespace App\Http\Livewire\Test\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
class All extends Component
{
    use WithPagination;

    public function render()
    {
    //    $this->posts=Post::paginate(5)->with('user');
        $posts=Post::paginate(5);
        return view('livewire.test.post.all',[
            'posts'=>$posts,
        ]);
    }
}
