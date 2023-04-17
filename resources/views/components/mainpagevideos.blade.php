@foreach($videos as $video)
@php($fulldate = explode(' ', $video->created_at))
@php($date = $fulldate[0])
@php($time = $fulldate[1])
<div class="video">
    <p><a href="{{ url('video/'.$video->id) }}">{{ $video->title }}</a></p>
    <video src="{{ asset('storage/videos/'.$video->path) }}"></video>
    <p> {{ \Carbon\Carbon::parse($video->created_at)->format('d.m.Y')}}</p>
</div>
@endforeach