@extends('layouts.main')

@section('header')
<h1>Posts</h1>
    
@endsection

@section('content')

    <table class="table table-bordered table-striped">
      <tr>
        <th>ID</th>
        <th>Titolo</th>
        <th>Sottotitolo</th>
        <th>Autore</th>
        <th>Immagine</th>
        <th>Data pubblicazione</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>

      @foreach ($posts as $post)
      <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->subtitle }}</td>
        <td>{{ $post->author }}</td>
        <td><img src="{{ $post->img_path }}" alt="" class="img-thumbnail">
          
        </td>
        <td>{{ $post->publication_date }}</td>
        <td><a class="btn btn-outline-info" href="{{ route('posts.show', $post->id) }}"><i class="fas fa-info-circle"></i></a></td>
      </tr>
          
      @endforeach
    </table>


@endsection