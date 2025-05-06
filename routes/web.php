<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\LaborTaskController;

 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});   



Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');


 // Gestión de roles
Route::get('/role', [RolePermissionController::class, 'index'])->name('role_permission.index');
Route::post('create-role', [RolePermissionController::class, 'storeRole'])->name('role_permission.storeRole');
Route::delete('delete-role/{roleId}', [RolePermissionController::class, 'deleteRole'])->name('role_permission.deleteRole');
Route::post('role_permission/assignRoleToUser/{userId}', [RolePermissionController::class, 'assignRoleToUser'])->name('role_permission.assignRoleToUser');
Route::delete('remove-role-from-user/{userId}', [RolePermissionController::class, 'removeRoleFromUser'])->name('role_permission.removeRoleFromUser');
Route::put('role_permission/updateUserRole/{userId}', [RolePermissionController::class, 'updateUserRole'])->name('role_permission.updateUserRole');


    //Material y mano de obra 
    Route::get('materials', [MaterialController::class, 'index'])->name('materials.index');
Route::get('materials/create', [MaterialController::class, 'create'])->name('materials.create');
Route::post('materials', [MaterialController::class, 'store'])->name('materials.store');
Route::get('materials/{material}', [MaterialController::class, 'show'])->name('materials.show');
Route::get('materials/{material}/edit', [MaterialController::class, 'edit'])->name('materials.edit');
Route::put('materials/{material}', [MaterialController::class, 'update'])->name('materials.update');
Route::delete('materials/{material}', [MaterialController::class, 'destroy'])->name('materials.destroy');

// Actividades y mano de obra 

Route::get('labor_tasks', [LaborTaskController::class, 'index'])->name('labor_tasks.index');
Route::get('labor_tasks/create', [LaborTaskController::class, 'create'])->name('labor_tasks.create');
Route::post('labor_tasks', [LaborTaskController::class, 'store'])->name('labor_tasks.store');
Route::get('labor_tasks/{laborTask}', [LaborTaskController::class, 'show'])->name('labor_tasks.show');
Route::get('labor_tasks/{laborTask}/edit', [LaborTaskController::class, 'edit'])->name('labor_tasks.edit');
Route::put('labor_tasks/{laborTask}', [LaborTaskController::class, 'update'])->name('labor_tasks.update');
Route::delete('labor_tasks/{laborTask}', [LaborTaskController::class, 'destroy'])->name('labor_tasks.destroy');