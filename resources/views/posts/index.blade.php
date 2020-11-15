<x-posts>

  <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
                <tr class="border-b">
                    <th class="text-center p-3 px-5"></th>
                    <th class="text-center p-3 px-5">Usuario</th>
                    <th class="text-center p-3 px-5">Titulo</th>
                    <th class="text-center p-3 px-5">Descripcion</th>
                    <th class="text-center p-3 px-5">Fecha De Creación</th>
                    <th class="text-center p-3 px-5">Categoría</th>
                    @can('create' , \App\Models\Post::class)
                        <th class="text-right p-3 px-5">
                        <a href="{{ route('posts.create') }}"><button type="button" class="bg-gray-700 hover:bg-black text-white font-bold py-2 px-4 border rounded">
                        Crear Nuevo Post
                        </button>
                        </a>
                        </th>
                    @endcan
                </tr>
                @foreach ($posts as $post)
                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                    <td class="p-3 text-center px-5">
                        <div class="flex-shrink-0 h-10 w-10"> 
                            <img class="h-10 w-10 rounded-full" src="{{ $post->user->profile_photo_url }}" alt="User">
                        </div>
                    </td>
                    <td class="p-3 text-center px-5">{{ $post->user->name }}</td>
                    <td class="p-3 text-center px-5">{{ Str::limit($post->title , 30) }}</td>
                    <td class="p-3 text-center px-5">{{ Str::limit($post->description , 30) }}</td>
                    <td class="p-3 text-center px-5">{{ $post->created_at }}</td>
                    <td class="p-3 text-center px-5">{{ Str::limit ($post->category->name_category , 15) }}</td>
                    <td class="p-3 text-center px-5 flex justify-end">
                    @can(['update' , 'delete' ], $post)
                    <a href="{{ route('posts.edit' , $post->id)}}"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Editar</button></a>
                    <form action="{{ route('posts.destroy', $post)}}" method="post">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Eliminar</button>
                    </form>
                    @endcan
                </tr>
                @endforeach
            </tbody>
        </table>



</x-posts>