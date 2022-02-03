<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class Show extends Component
{

    public $post_id;
    public $post;
    public $posts_user=[];
    public $posts=[];

    public $message = 'Hello World!';


    public function render()
    {
        $this->posts_user= User::find(Auth::user()->id)->posts()->get();

        // dd($posts);
        // $this->posts_user=$user->posts()->get();


        $this->posts=Post::with('user')->get();


        return view('livewire.post.show');
    }
}
