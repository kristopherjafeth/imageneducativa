<?php

namespace App\Http\Controllers;

use App\Models\Carpeta;
use App\Models\Color;
use App\Models\Medida;
use Illuminate\Http\Request;


class CarpetaController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:ver-carpeta|crear-carpeta|editar-carpeta|borrar-carpeta', ['only' => ['index']]);
         $this->middleware('permission:crear-carpeta', ['only' => ['create','store']]);
         $this->middleware('permission:editar-carpeta', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-carpeta', ['only' => ['destroy']]);
    }


    public function index()
    {
        $carpetas = Carpeta::paginate(5);

        return view('carpeta.index', compact('carpetas'));
           
    }

  
    public function create()
    {
        $carpeta = new Carpeta();
        $colores = Color::pluck('nombrecolor', 'id');
        $medidas = Medida::pluck('nombremedida', 'id');

        return view('carpeta.create', compact('carpeta','colores','medidas'));
    }

  
    public function store(Request $request)
    {
        request()->validate(Carpeta::$rules);

        $carpeta = Carpeta::create($request->all());

       
        return redirect()->route('carpetas.index')
            ->with('success', 'Carpeta created successfully.');
    }

  
    public function show($id)
    {
        $carpeta = Carpeta::find($id);

        return view('carpeta.show', compact('carpeta'));
    }

    
    public function edit($id)
    {
        $carpeta = Carpeta::find($id);

        return view('carpeta.edit', compact('carpeta'));
    }

 
    public function update(Request $request, Carpeta $carpeta)
    {
        request()->validate(Carpeta::$rules);

        $carpeta->update($request->all());

        return redirect()->route('carpetas.index')
            ->with('success', 'Carpeta updated successfully');
    }

  
    public function destroy($id)
    {
        $carpeta = Carpeta::find($id)->delete();

        return redirect()->route('carpetas.index')
            ->with('success', 'Carpeta deleted successfully');
    }
}
