<x-blogs>
<h1 class="text-4xl font-bold text-white text-center mt-8">BLOGZ</h1>
<p class="text-center font-semibold text-white text-xl mb-16">Bienvenido a blogz! Desliza para ver nuestros últimos posts o busca por los temas que más te interesen</p>
@foreach($posts as $post)
<div class="ml-auto mr-auto bg-gray-700 h-screen flex items-center justify-center px-32 -mt-32">
  <div class="flex flex-col w-full bg-white rounded shadow-lg sm:w-3/4 md:w-1/2 lg:w-3/5">
    <div class="w-full h-64 bg-top bg-cover rounded-t" style="background-image: url(https://www.si.com/.image/t_share/MTY4MTkyMjczODM4OTc0ODQ5/cfp-trophy-deitschjpg.jpg)"></div>
        <div class="flex flex-col w-full md:flex-row">
            <div class="flex flex-row justify-around p-4 font-bold leading-none text-gray-800 uppercase bg-gray-400 rounded md:flex-col md:items-center md:justify-center md:w-1/4">
                <div class="md:text-2xl">Creado el {{ Str::limit($post->created_at , 10) }}</div>
            </div>
            <div class="p-4 font-normal text-gray-800 md:w-3/4">
                <h1 class="mb-4 text-4xl font-bold leading-none tracking-tight text-gray-800">{{ $post->title }}</h1>
                <p class="leading-normal">{{ Str::limit($post->description , 125, '...') }}</p>
                <div class="flex flex-row items-center mt-4 text-gray-700">
                    <div class="w-auto bg-green-800 rounded text-white font-bold p-1">
                    {{ $post->category->name_category }}
                    </div>
                    <div class="w-1/2 flex justify-end ml-64">
                    <button class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Ver Artículo Completo
                    </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
</x-blogs>