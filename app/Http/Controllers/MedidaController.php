<?php

namespace App\Http\Controllers;

use App\Models\Medida;
use Illuminate\Http\Request;

/**
 * Class MedidaController
 * @package App\Http\Controllers
 */
class MedidaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-medidas|crear-medidas|editar-medidas|borrar-medidas')->only('index');
         $this->middleware('permission:crear-medidas', ['only' => ['create','store']]);
         $this->middleware('permission:editar-medidas', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-medidas', ['only' => ['destroy']]);
    }

    public function index()
    {
        $medidas = Medida::paginate('5');

        return view('medida.index', compact('medidas'))
            ->with('i', (request()->input('page', 1) - 1) * $medidas->perPage());
    }

 
    public function create()
    {
        $medida = new Medida();
        return view('medida.create', compact('medida'));
    }


    public function store(Request $request)
    {
        request()->validate(Medida::$rules);

        $medida = Medida::create($request->all());

        return redirect()->route('medidas.index')
            ->with('success', 'Medida created successfully.');
    }

   
    public function show($id)
    {
        $medida = Medida::find($id);

        return view('medida.show', compact('medida'));
    }

 
    public function edit($id)
    {
        $medida = Medida::find($id);

        return view('medida.edit', compact('medida'));
    }


    public function update(Request $request, Medida $medida)
    {
        request()->validate(Medida::$rules);

        $medida->update($request->all());

        return redirect()->route('medidas.index')
            ->with('success', 'Medida updated successfully');
    }

   
    public function destroy($id)
    {
        $medida = Medida::find($id)->delete();

        return redirect()->route('medidas.index')
            ->with('success', 'Medida deleted successfully');
    }

    public function medidasposts(Request $request){
        if(isset($request->nombremedida)){
           
        }
    }
}
