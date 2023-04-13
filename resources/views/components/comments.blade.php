@foreach($comments as $comment)
<img src="{{ asset('storage/profile_pics/'.$user->path) }}" alt="">
            <p>{{ $comment->user_name }}</p>
            <p>{{ $comment->created_at }}</p>
            <p>{{ $comment->text }}</p>
        @endforeach