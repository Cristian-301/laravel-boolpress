@extends('layouts.main')

@section('header')
<h1>Posts</h1>
    
@endsection

@section('content')
  @if (session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
  @endif
  <div class="text-right">
    <a class="btn btn-outline-success mb-3" href="{{ route('posts.create') }}">+</a>
  </div>

   
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
        <td><img src="{{ $post->img_path }}" alt="" class="img-thumbnail"></td>
        <td>{{ $post->publication_date }}</td>
        <td><a class="btn btn-info" href="{{ route('posts.show', $post->id) }}"><i class="fas fa-info-circle"></i></a></td>
        <td><a class="btn btn-warning" href="{{ route('posts.edit', $post->id) }}"><i class="far fa-edit"></i></a></td>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <td> <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> </td>
        
        </form>
      </tr>
          
      @endforeach
    </table>


@endsection