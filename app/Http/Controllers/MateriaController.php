<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Materia;
use Illuminate\Http\Request;

/**
 * Class MateriaController
 * @package App\Http\Controllers
 */
class MateriaController extends Controller
{
   
    public function index()
    {
        $materias = Materia::paginate('5');

        return view('materia.index', compact('materias'))
            ->with('i', (request()->input('page', 1) - 1) * $materias->perPage());
    }

  
    public function create()
    {
        $materia = new Materia();
        $grados = Grado::pluck('nombregrado', 'id');
        return view('materia.create', compact('materia','grados'));
    }

   
    public function store(Request $request)
    {
        request()->validate(Materia::$rules);

        $materia = Materia::create($request->all());

        return redirect()->route('materias.index')
            ->with('success', 'Materia creada correctamente.');
    }

  
    public function show($id)
    {
        $materia = Materia::find($id);

        return view('materia.show', compact('materia'));
    }

   
    public function edit($id)
    {
        $materia = Materia::find($id);

        return view('materia.edit', compact('materia'));
    }

   
    public function update(Request $request, Materia $materia)
    {
        request()->validate(Materia::$rules);

        $materia->update($request->all());

        return redirect()->route('materias.index')
            ->with('success', 'Materia updated successfully');
    }

   
    public function destroy($id)
    {
        $materia = Materia::find($id)->delete();

        return redirect()->route('materias.index')
            ->with('success', 'Materia deleted successfully');
    }
}
