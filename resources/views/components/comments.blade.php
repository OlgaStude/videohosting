@foreach($comments as $comment)
<div class="comment-item">
<div class="comment-img">
<img src="{{ asset('storage/profile_pics/'.$user->path) }}" alt="">
</div>
			<div class="comment-text">
			<div class="phantom">
            <p class="comment-name">{{ $comment->user_name }}</p>
            <p class="comment-date">{{ $comment->created_at }}</p>
        	</div>
            <p class="comment-text2">{{ $comment->text }}</p>
            </div>
</div>
        @endforeach