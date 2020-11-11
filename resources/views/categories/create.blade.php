<x-categories>

<h1 class="text-center mb-4 text-2xl font-semibold">Crear Nueva Categoría</h1>

<form method="POST" action="{{ route('categories.store') }}" class="w-full max-w-lg text-center ml-auto mr-auto border-black border-2 p-4 rounded">
  @csrf
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name_category">
        Nombre De La Categoría
      </label>
      <input class="appearance-none block w-full bg-gray-400 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name_category" name="name_category" value="{{ old('name_category') }}" type="text">
      @error('name_category')
      <p class="text-red-700 text-xs font-bold">Este campo es obligatorio!</p>
      @enderror


      <select class="block text-center appearance-none w-full bg-gray-400 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="user_id" name="user_id" value="{{ old('user_id') }}" required>
            <option disabled selected>Seleccionar</option>
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
      </select>
    </div>



        <button class="bg-gray-800 hover:bg-black text-white font-bold py-2 px-4 rounded">
          Crear Categoría
        </button>
      </div>
    </div>
  </div>
</form>

</x-categories>