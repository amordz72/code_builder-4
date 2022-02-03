<div>
    <div class="bg-red-400">
        <h1 class="text-center ">Show</h1>
 </div>

        <input type="text" class="rounded my-4 " wire:model='$post_id'><br>


@foreach ($posts as $post)
   <h1>{{ $post->title }}
       {{ $post->user->name }}</h1>
@endforeach


<div class="mt-5">
@foreach ($posts_user as $post2)
   <h1>{{ $post2->title }}
       {{ $post2->user->name }}</h1>
@endforeach
</div>



</div>
