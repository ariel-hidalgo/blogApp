<x-categories>

<table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
                <tr class="border-b">
                    <th class="text-center p-3 px-5"></th>
                    <th class="text-center p-3 px-5">Usuario</th>
                    <th class="text-center p-3">Id</th>
                    <th class="text-center p-3">Nombre Categoría</th>
                    @can('create' , \App\Models\Category::class)
                    <th class="text-right p-3">
                    <a href="{{ route('categories.create') }}"><button type="button" class="bg-gray-700 hover:bg-black text-white font-bold py-2 px-4 border rounded">
                    Crear Nueva Categoría
                    </button>
                    </a>
                    </th>
                    @endcan
                </tr>
                @foreach ($categories as $category)
                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                    <td class="p-3 text-center px-5">
                        <div class="flex-shrink-0 h-10 w-10"> 
                            <img class="h-10 w-10 rounded-full" src="{{ $category->user->profile_photo_url }}" alt="User">
                        </div>
                    </td>
                    <td class="p-3 text-center">{{ $category->user->name }}</td>
                    <td class="p-3 text-center">{{ $category->id }}</td>
                    <td class="p-3 text-center">{{ Str::limit($category->name_category , 50)}}</td>
                    @can(['update' , 'delete'] , $category)
                    <td class="p-3 text-center flex justify-end">
                    <a href="{{ route('categories.edit' , $category->id)}}"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Editar</button></a>

                    <form action="{{ route('categories.destroy', $category)}}" method="post">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 rounded focus:outline-none focus:shadow-outline px-2">Eliminar</button>
                    @endcan
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>

</x-categories>