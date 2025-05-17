<?php

namespace App\Http\Controllers;
use App\Models\LaborTask;
use Illuminate\Http\Request;

class LaborTaskController extends Controller
{
    public function index() {
        $tasks = LaborTask::all();
        return view('labor_tasks.index', compact('tasks'));
    }

    public function create() {
        return view('labor_tasks.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'clasificacion' => 'required|string',
            'item' => 'required|integer',
            'descripcion' => 'required|string',
            'unidad_medida' => 'required|string',
            'valor_prefijado_a' => 'nullable|numeric',
            'valor_prefijado_b' => 'nullable|numeric',
            'definicion' => 'nullable|string',
            'cantidad' => 'nullable|integer',
        ]);

        $data['valor_total'] = ($data['cantidad'] ?? 0) * ($data['valor_prefijado_a'] ?? 0);
        LaborTask::create($data);

        return redirect()->route('labor_tasks.index');
    }

    public function destroy(LaborTask $task)
{
    $task->delete();

    return redirect()->route('labor_tasks.index')->with('success', 'Labor eliminada correctamente.');
}

}
