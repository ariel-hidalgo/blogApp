<x-posts>   
    <h2 class="text-center text-black">Editar Post</h2>
        <form method="POST" action="{{ route('posts.update' , $post->id )}}">
            @csrf
            @method('PUT')
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="title">
                            Titulo
                        </label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="title" name="title"  type="text" value="{{ old('title') ?? $post->title }}">
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="description">
                            Descripción
                        </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="description" name="description" type="text" value="{{ old('description') ?? $post->description }}">
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="date">
                        Fecha
                    </label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="date" name="date" type="text" value="{{ old('date') ?? $post->date }}">
                </div>
                <div class="-mx-3 md:flex mb-2">
                    <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="category">
                        Categoría
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="category" name="category">
                        <option>Música</option>
                        <option>Películas</option>
                        <option>Series</option>
                        <option>Anime</option>
                        </select>
                        <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div>
                    <button type="submit" class="relative bg-gray-500 text-black p-6 rounded text-2xl font-bold overflow-visible">
                    Editar Post
                    </button>
                </div>
        </form>
</x-posts>