<x-posts>
<h1>Editar Post</h1>
<form method="POST" action="{{ route('posts.update' , $post->id )}}">
    @csrf
        @method('PUT')
<button type="submit" class="btn btn-dark">Editar</button>
  <div class="form-group">
    <label for="title">Titulo</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $post->title }}">
  </div>
  <div class="form-group">
    <label for="description">Descripción</label>
    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') ?? $post->description }}</textarea>
  </div>
  <div class="form-group">
    <label for="date">Fecha</label>
    <input type="text" class="form-control" id="date" name="date" value="{{ old('date') ?? $post->date }}">
  </div>
  <div class="form-group">
    <label for="category">Categoría</label>
    <select class="form-control" id="category" name="category" value="{{ old('category') ?? $post->category }}">
      <option>Musica</option>
      <option>Peliculas</option>
      <option>Series</option>
      <option>Anime</option>
  </div>
</form>
</x-posts>