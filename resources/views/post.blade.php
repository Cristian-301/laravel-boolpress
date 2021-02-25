@extends('layouts.main')

@section('header')
    <img src="{{$post->img_path}}" alt="{{$post->title}}">
    <h1 class="my-3">{{$post->title}}</h1>
    <h3>{{$post->subtitle}}</h3>
@endsection

@section('content')
    <p class="text-justify">{{$post->text}}</p>
    <div class="text-right">
        <span>{{$post->author}} - {{$post->publication_date}}</span>
    </div>
@endsection
{{-- @dd($post->infoPost->comment_status) --}}
@section('footer')
<h2>Comment section</h2>
{{-- @dd($post->comments) --}}
@if($post->infoPost->comment_status == 'open')
@foreach ($post->comments as $comment)
<ul>
    <li>
        <span>{{$comment->author}} - {{$comment->created_at}}</span>
        <p>{{$comment->text}}</p>
    </li>
</ul>
    
@endforeach
@endif
@endsection