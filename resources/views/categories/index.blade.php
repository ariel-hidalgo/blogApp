<x-categories>

<table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
                <tr class="border-b">
                    <th class="text-center p-3">Id</th>
                    <th class="text-center p-3">Nombre Categoría</th>
                    <th class="text-right p-3">
                    <a href="{{ route('categories.create') }}"><button type="button" class="bg-gray-700 hover:bg-black text-white font-bold py-2 px-4 border rounded">
                    Crear Nueva Categoría
                    </button>
                    </a>
                    </th>
                </tr>
                @foreach ($categories as $category)
                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                    <td class="p-3 text-center">{{ $category->id }}</td>
                    <td class="p-3 text-center">{{ $category->name_category}}</td>
                    <td class="p-3 text-center flex justify-end">
                    <a href="{{ route('categories.edit' , $category->id)}}"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Editar</button></a>

                    <form action="{{ route('categories.destroy', $category)}}" method="post">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 rounded focus:outline-none focus:shadow-outline px-2">Eliminar</button>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>

</x-categories>