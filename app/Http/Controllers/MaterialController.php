<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    public function index() {
        $materials = Material::all();
        return view('materials.index', compact('materials'));
    }

    public function create() {
        return view('materials.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'cod_cens' => 'required|string',
            'descripcion' => 'required|string',
            'unidad' => 'required|string',
            'precio_unitario' => 'required|numeric',
            'cantidad' => 'nullable|integer',
        ]);
        $data['valor'] = ($data['cantidad'] ?? 0) * $data['precio_unitario'];
        Material::create($data);

        return redirect()->route('materials.index');
    }

    public function destroy(Material $material)
{
    $material->delete();
    return redirect()->route('materials.index')->with('success', 'Material eliminado correctamente');
}

    public function edit(Material $material) {
        return view('materials.edit', compact('material'));
    }

    public function update(Request $request, Material $material) {
        $data = $request->validate([
            'cod_cens' => 'required|string',
            'descripcion' => 'required|string',
            'unidad' => 'required|string',
            'precio_unitario' => 'required|numeric',
            'cantidad' => 'nullable|integer',
        ]);
        $data['valor'] = ($data['cantidad'] ?? 0) * $data['precio_unitario'];
        $material->update($data);

        return redirect()->route('materials.index')->with('success', 'Material actualizado correctamente');
    }

  

}
