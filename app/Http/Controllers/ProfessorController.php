<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{

    public function index()
    {
        $professors = Professor::all();
        return view('professors.index', compact('professors'));

        //alternativas a compact
        //return view('professors.index')->with('professors', $professors);
        //return view('professors.index', ['professors' => $professors]);
    }

    public function create()
    {
        return view('professors.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'age' => 'required|integer|min:1',
        ]);

         // Crear un nuevo estudiante usando el método `create` del modelo
        Professor::create($request->all());

        // Redireccionar a la vista de listado de estudiantes
        return redirect()->route('professors.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $Professor = Professor::findOrFail($id);
        return view('professors.edit', compact('Professor'));
    }

    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'age' => 'required|integer|min:1',
        ]);

        // Buscar el estudiante por su ID
        $Professor = Professor::findOrFail($id);

        // Actualizar los datos del estudiante
        $Professor->update($request->all());

        // Redireccionar a la vista de listado de estudiantes
        return redirect()->route('professors.index');
    }

    public function destroy(string $id)
    {
        $Professor = Professor::findOrFail($id);

        $Professor->delete();

        return redirect()->route('professors.index');
    }
}
