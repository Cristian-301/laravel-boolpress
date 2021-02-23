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
    <form action="{{ route('posts.store') }}" method="POST">
      @csrf
      @method('POST')

      <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" >
      </div>
      <div class="form-group">
        <label for="subtitle">Sottotitolo</label>
        <input type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" id="subtitle" value="{{ old('subtitle') }}" >
      </div>
      <div class="form-group">
        <label for="text">Testo</label>
        <textarea class="form-control" name="text" id="text" rows="5">{{ old('text') }}</textarea>
      </div>
      <div class="form-group">
        <label for="author">Autore</label>
        <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" id="author" value="{{ old('author') }}" >
      </div>
      <div class="form-group">
        <label for="img_path">Link immagine</label>
        <input type="text" class="form-control @error('img_path') is-invalid @enderror" name="img_path" id="img_path" value="{{ old('img_path') }}" >
      </div>
      <div class="form-group">
        <label for="publication_date">Data publicazione</label>
        <input type="date" class="form-control @error('publication_date') is-invalid @enderror" name="publication_date" id="publication_date" value="{{ old('publication_date') }}" >
      </div>
      <div class="form-group">
        <label for="post_status">Post status</label>
        <select class="form-control" id="post_status" name="post_status">
          <option value="public" {{ old("post_status") == "public" ? 'selected' : '' }} >public</option>
          <option value="draft" {{ old("post_status") == "draft" ? 'selected' : '' }}>draft</option>
          <option value="private" {{ old("post_status") == "private" ? 'selected' : '' }}>private</option>
        </select>
      </div>
      <div class="form-group">
        <label for="comment_status">Comment status</label>
        <select class="form-control" id="comment_status" name="comment_status">
          <option value="open" {{ old("comment_status") == "open" ? 'selected' : '' }}>open</option>
          <option value="closed" {{ old("comment_status") == "closed" ? 'selected' : '' }}>closed</option>
          <option value="private" {{ old("comment_status") == "private" ? 'selected' : '' }}>private</option>
        </select>
      </div>

      <h2>Tags</h2>
      @foreach ($tags as $tag)
      <div class="form-group custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
        <label class="custom-control-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
      </div>
      @endforeach

      <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>
@endsection