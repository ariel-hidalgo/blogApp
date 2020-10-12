<x-posts>

  <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
                <tr class="border-b">
                    <th class="text-center p-3 px-5">Titulo</th>
                    <th class="text-center p-3 px-5">Descripcion</th>
                    <th class="text-center p-3 px-5">Fecha</th>
                    <th class="text-center p-3 px-5">Categoría</th>
                    <th class="text-right p-3 px-5">
                    <a href="{{ route('posts.create') }}"><button type="button" class="bg-gray-700 hover:bg-black text-white font-bold py-2 px-4 border rounded">
                    Crear Nuevo Post
                    </button>
                    </a>
                    </th>
                </tr>
                @foreach ($posts as $post)
                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                    <td class="p-3 text-center px-5">{{ Str::limit($post->title , 30) }}</td>
                    <td class="p-3 text-center px-5">{{ Str::limit($post->description , 30) }}</td>
                    <td class="p-3 text-center px-5">{{ $post->date }}</td>
                    <td class="p-3 text-center px-5">{{ $post->category }}</td>
                    <td class="p-3 text-center px-5 flex justify-end">
                    <a href="{{ route('posts.edit' , $post->id)}}"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Editar</button></a>

                    <form action="{{ route('posts.destroy', $post)}}" method="post">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Eliminar</button>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>



</x-posts>