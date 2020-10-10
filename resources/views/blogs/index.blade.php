<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Blogz - Inicio</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Blogz</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('blogs.index') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Musica</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Películas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Series</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Anime</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Admin</a>
        </li>
        </ul>
    </div>
    </nav>

@foreach ($posts as $post)
    <div class="card text-center">
        <div class="card-header">
        {{ $post->category }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->description }}</p>
            <a href="#" class="btn btn-primary">Ver Artículo</a>
        </div>
        <div class="card-footer text-muted">
            {{ $post->date }}
        </div>
    </div>
@endforeach
</body>
</html>