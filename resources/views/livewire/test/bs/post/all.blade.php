<div>
    <table class="table table-hover table-responsive mt-3 text-center">
        <thead class="" style="background: rgb(226, 117, 117)">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)


            <tr>
                <th scope="row"> {{ $post->id }}</th>
                <td> {{ $post->title }}</td>
                <td> {{ $post->body }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="flex justify-center">
        {{ $posts->links() }}
    </div>
</div>
