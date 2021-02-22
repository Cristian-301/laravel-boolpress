@extends('layouts.main')

@section('header')
    <h1>Detaglio Post</h1>
    {{-- @dump($post->infoPost)
    <p>Post status: {{$post->infoPost->post_status}}</p> --}}
@endsection

@section('content')

<table class="table table-bordered table-striped">
  @foreach ($post->getAttributes() as $key => $value)

    <tr>
      <td>{{ $key }}</td>
      <td>
        {{ $value }}
        @if ($key == 'img_path')
        <img src="{{ $value }}" alt="">
        @endif
      </td>
    </tr>

  @endforeach
    <tr>
      <td>Comment status</td>
      <td>{{$post->infoPost->comment_status}}</td>
    </tr>
    <tr>
      <td>Post status</td>
      <td>{{$post->infoPost->post_status}}</td>
    </tr>
</table>   
@endsection

@section('footer')
    <h3>Commenti</h3>
    {{-- @dump($post->comments) --}}
    @foreach ($post->comments as $comment)
      <ul>
        <li>
          <small>{{ $comment->author }}</small>
          <p>{{ $comment->text }}</p>
        </li>
      </ul>
        
    @endforeach

    <a class="btn btn-primary" href="{{ route('posts.index') }}">Elenco posts</a>
@endsection