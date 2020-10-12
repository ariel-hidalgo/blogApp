<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> 
    <title>Blogz</title>
</head>
<body class="bg-gray-700">


<nav class="flex justify-between w-full bg-purple-500 text-white p-4">
      <a href="{{ url('/') }}"><span class="font-bold text-2xl text-white">Blogz</span></a>
        <div class="md:items-center md:w-auto flex mr-auto ml-auto">
          <div class="md:flex hidden">
            <a class="block text-white text-xl font-bold mr-16 hover:bg-purple-400" href="{{ url('/music') }}">Música</a>
            <a class="block text-white text-xl font-bold mr-16 hover:bg-purple-400" href="{{ url('/films') }}">Películas</a>
            <a class="block text-white text-xl font-bold mr-16 hover:bg-purple-400" href="{{ url('/series') }}">Series</a>
            <a class="block text-white text-xl font-bold mr-16 hover:bg-purple-400" href="{{ url('/anime') }}">Anime</a>
            <a class="block text-white text-xl font-bold mr-16 hover:bg-purple-400 mr-16" href="{{ url('/admin') }}">Administración</a>
          </div>
        </div>
        <a href="{{ url('/') }}"><span class="font-bold text-2xl text-white">Blogz</span></a>
</nav>
    {{ $slot }}
    
</body>
</html>