<x-posts>
<h1>Crear Nuevo Post</h1>
<form method="POST" action="{{ route('posts.store') }}">
@csrf
<button type="submit" class="btn btn-dark">Crear</button>
  <div class="form-group">
    <label for="title">Titulo</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
    @error('title')
    <div class="alert alert-danger" role="alert">Por favor inserte un título valido!</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="description">Descripción</label>
    <textarea class="form-control" id="description" name="description" rows="4"> {{ old('description') }} </textarea>
    @error('description')
    <div class="alert alert-danger" role="alert">Por favor inserte una descripción valida!</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="date">Fecha</label>
    <input type="text" class="form-control" id="date" name="date" value="{{ old('date') }}">
    @error('date')
    <div class="alert alert-danger" role="alert">Por favor inserte una fecha valida!</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="category">Categoría</label>
    <select class="form-control" id="category" name="category">
      <option>Musica</option>
      <option>Peliculas</option>
      <option>Series</option>
      <option>Anime</option>
  </div>
</form>
</x-posts>