<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User; // Asegúrate de importar el modelo User


class RolePermissionController extends Controller
{
     // Mostrar roles y usuarios
     public function index()
{
    $roles = Role::all();
    $users = User::all(); // Obtener todos los usuarios
    return view('role_permission.index', compact('roles', 'users'));
}

 
     // Crear un nuevo rol
     public function storeRole(Request $request)
     {
         $request->validate([
             'role_name' => 'required|string|max:255|unique:roles,name',
         ]);
 
         Role::create(['name' => $request->role_name]);
         return redirect()->route('role_permission.index')->with('success', 'Role created successfully!');
     }
 
     // Asignar un rol a un usuario
     public function assignRoleToUser(Request $request, $userId)
     {
         $user = User::find($userId);
         $user->assignRole($request->role);
 
         return redirect()->route('role_permission.index')->with('success', 'Role assigned to user successfully!');
     }
 
     // Eliminar un rol
     public function deleteRole($roleId)
     {
         $role = Role::findById($roleId);
         $role->delete();
 
         return redirect()->route('role_permission.index')->with('success', 'Role deleted successfully!');
     }
 
     // Eliminar un rol de un usuario
     public function removeRoleFromUser(Request $request, $userId)
     {
         $user = User::find($userId);
         $user->removeRole($request->role);
 
         return redirect()->route('role_permission.index')->with('success', 'Role removed from user successfully!');
     }
}
