<div>
    <!-- An unexamined life is not worth living. - Socrates -->
    @foreach($posts as $post)
        <p>{{ $post->content }}</p>
    @endforeach
</div>
