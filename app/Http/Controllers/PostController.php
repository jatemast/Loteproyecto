<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
     // Mostrar todos los posts
     public function index()
     {
         $posts = Post::all(); // Obtiene todos los posts
         return view('posts.index', compact('posts')); // Retorna una vista
     }
 
     // Mostrar el formulario para crear un nuevo post
     public function create()
     {
         return view('posts.create'); // Vista para crear un nuevo post
     }
 
     // Guardar un nuevo post
     public function store(Request $request)
     {
         $request->validate([
             'title' => 'required|string|max:255',
             'content' => 'required|string',
         ]);
 
         Post::create([
             'title' => $request->title,
             'content' => $request->content,
         ]);
 
         return redirect()->route('posts.index');
     }
 
     // Mostrar un post específico
     public function show($id)
     {
         $post = Post::findOrFail($id); // Buscar post por id
         return view('posts.show', compact('post')); // Retorna la vista del post
     }
 
     // Mostrar el formulario para editar un post
     public function edit($id)
     {
         $post = Post::findOrFail($id); // Buscar post por id
         return view('posts.edit', compact('post')); // Vista de edición
     }
 
     // Actualizar un post
     public function update(Request $request, $id)
     {
         $request->validate([
             'title' => 'required|string|max:255',
             'content' => 'required|string',
         ]);
 
         $post = Post::findOrFail($id);
         $post->update([
             'title' => $request->title,
             'content' => $request->content,
         ]);
 
         return redirect()->route('posts.index');
     }
 
     // Eliminar un post
     public function destroy($id)
     {
         $post = Post::findOrFail($id);
         $post->delete();
 
         return redirect()->route('posts.index');
     }
}
