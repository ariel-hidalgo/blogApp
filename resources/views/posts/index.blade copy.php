<x-posts>

<a href="{{ route('posts.create') }}">
  <button type="button" class="btn btn-dark">Crear Nuevo Post</button>
</a>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Descripción</th>
      <th scope="col">Fecha</th>
      <th scope="col">Categoría</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($posts as $post)
    <tr>
      <th>{{ $post->id }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->str_limit(description) }}</td>
      <td>{{ $post->date }}</td>
      <td>{{ $post->category }}</td>
      <td><a href="{{ route('posts.edit' , $post->id)}}" class="btn btn-link">Editar</a></td>
      <td>
        <form action="{{ route('posts.destroy', $post)}}" method="post">
              {{ method_field('DELETE') }}
              @csrf
              <button type="submit" class="btn btn-link">Borrar</button>
      </td>
        </form>
    </tr>
  @endforeach
  </tbody>
</table>

</table>
</x-posts>