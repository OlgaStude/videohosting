@foreach($comments as $comment)
            <p>{{ $comment->user_name }}</p>
            <p>{{ $comment->text }}</p>
            <p>{{ $comment->created_at }}</p>
        @endforeach