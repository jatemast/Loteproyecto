<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">All Posts</h1>

            <!-- Botón para crear un nuevo post, solo si el usuario tiene el permiso 'crear posts' -->
            @can('crear posts')
                <a href="/posts/create" class="btn btn-success">Create New Post</a>
            @endcan
        </div>

        @if($posts->isEmpty())
            <div class="alert alert-info">No posts found.</div>
        @else
            <ul class="list-group">
                @foreach ($posts as $post)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <a href="/posts/{{ $post->id }}" class="text-decoration-none fw-bold">{{ $post->title }}</a>
                        </div>
                        <div>
                            <!-- Botón Editar, solo si el usuario tiene el permiso 'editar posts' -->
                            @can('editar posts')
                                <a href="/posts/{{ $post->id }}/edit" class="btn btn-sm btn-warning me-2">Edit</a>
                            @endcan

                            <!-- Formulario para eliminar, solo si el usuario tiene el permiso 'eliminar posts' -->
                            @can('eliminar posts')
                                <form action="/posts/{{ $post->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
