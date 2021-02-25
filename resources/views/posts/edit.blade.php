@extends('layouts.main')

@section('header')
    <h1>Crea un nuovo post</h1>
@endsection

@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{$post->title}}" >
      </div>
      <div class="form-group">
        <label for="subtitle">Sottotitolo</label>
        <input type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" id="subtitle" value="{{ $post->subtitle }}" >
      </div>
      <div class="form-group">
        <label for="text">Testo</label>
        <textarea class="form-control" name="text" id="text" rows="5">{{ $post->text }}</textarea>
      </div>
      <div class="form-group">
        <label for="author">Autore</label>
        <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" id="author" value="{{ $post->author }}" >
      </div>
      <div class="form-group">
        <label for="img_path">Link immagine</label>
        <input type="text" class="form-control @error('img_path') is-invalid @enderror" name="img_path" id="img_path" value="{{ $post->img_path }}" >
      </div>
      <div class="form-group">
        <label for="publication_date">Data publicazione</label>
        <input type="date" class="form-control @error('publication_date') is-invalid @enderror" name="publication_date" id="publication_date" value="{{ $post->publication_date }}" >
      </div>
      <div class="form-group">
        <label for="post_status">Post status</label>
        <select class="form-control" id="post_status" name="post_status">
          <option value="public" {{ $post->InfoPost->post_status == "public" ? 'selected' : '' }}>public</option>
          <option value="draft" {{ $post->InfoPost->post_status == "draft" ? 'selected' : '' }}>draft</option>
          <option value="private" {{ $post->InfoPost->post_status == "private" ? 'selected' : '' }}>private</option>
        </select>
      </div>
      <div class="form-group">
        <label for="comment_status">Comment status</label>
        <select class="form-control" id="comment_status" name="comment_status">
          <option value="open" {{ $post->InfoPost->comment_status == "open" ? 'selected' : '' }}>open</option>
          <option value="closed" {{ $post->InfoPost->comment_status == "closed" ? 'selected' : '' }}>closed</option>
          <option value="private" {{ $post->InfoPost->comment_status == "private" ? 'selected' : '' }}>private</option>
        </select>
      </div>
      <h2>Tags</h2>
      @foreach ($tags as $tag)
      <div class="form-group custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}"
        @if($post->tags->contains($tag->id)) checked @endif>
        <label class="custom-control-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
      </div>
      @endforeach

      <h2>Images</h2>
      @foreach ($images as $image)
      <div class="form-group custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="image-{{ $image->id }}" name="images[]" value="{{ $image->id }}" @if($post->images->contains($image->id)) checked @endif>
        <label class="custom-control-label" for="image-{{ $image->id }}">
          {{ $image->alt }} <img style="width: 40px" src="{{ $image->link }}" alt="{{ $image->alt }}">
        </label>
      </div>
      @endforeach
      <button type="submit" class="btn btn-primary">Aggiorna</button>
    </form>
@endsection