@foreach($videos as $video)
@php($fulldate = explode(' ', $video->created_at))
@php($date = $fulldate[0])
@php($time = $fulldate[1])
<div class="video">
    <video src="{{ asset('storage/videos/'.$video->path) }}">
    <source src="{{ asset('storage/videos/'.$video->path) }}#t=60,70" type="video/mp4">

    </video>
    <p class="video-name"><a href="{{ url('video/'.$video->id) }}">{{ $video->title }}</a></p>
    <p class="date"> {{ \Carbon\Carbon::parse($video->created_at)->format('d.m.Y')}}</p>
</div>
@endforeach
