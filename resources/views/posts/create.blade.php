<x-posts>
<h1 class="text-center mb-4 text-2xl font-semibold">Crear Nuevo Post</h1>

<form method="POST" action="{{ route('posts.store') }}" class="w-full max-w-lg text-center ml-auto mr-auto border-black border-2 p-4 rounded">
  @csrf
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
        Título
      </label>
      <input class="appearance-none block w-full bg-gray-400 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="title" name="title" value="{{ old('title') }}" type="text">
      @error('title')
      <p class="text-red-700 text-xs font-bold">Este campo es obligatorio!</p>
      @enderror
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
          <div class="relative w-full appearance-none label-floating">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
          Descripción
          </label>
              <textarea class="autoexpand tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-400 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                  id="description" name="description" type="text">{{ old('description') }}</textarea>
                  @error('description')
                  <p class="text-red-700 text-xs font-bold">Este campo es obligatorio!</p>
                  @enderror
          </div>
  </div>
    <div class="w-auto md:w-1/3 px-3 mb-6 md:mb-0 mr-auto ml-auto">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category_id">
        Categoría
      </label>
      <div class="relative">
        <select class="block text-center appearance-none w-full bg-gray-400 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="category_id" name="category_id" value="{{ old('category_id') }}" required>
            <option disabled selected>Seleccionar</option>
              @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name_category }}</option>
              @endforeach
        </select>
        @error('category_id')
            <p class="text-red-700 text-xs font-bold">Este campo es obligatorio!</p>
        @enderror

        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="user_id">
          Usuario
        </label>
        <select class="block text-center appearance-none w-full bg-gray-400 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="user_id" name="user_id" value="{{ old('user_id') }}" required>
          <option disabled selected>Seleccionar</option>
              @foreach($users as $user)
          <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
        </select>
        @error('user_id')
            <p class="text-red-700 text-xs font-bold">Este campo es obligatorio!</p>
        @enderror

        <button class="bg-gray-800 hover:bg-black text-white font-bold py-2 px-4 rounded mt-4">
          Crear Post
        </button>
      </div>  
    </div>
</form>

</x-posts>