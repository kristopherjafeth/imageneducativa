<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-producto|crear-producto|editar-producto|borrar-producto', ['only' => ['index']]);
         $this->middleware('permission:crear-producto', ['only' => ['create','store']]);
         $this->middleware('permission:editar-producto', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-producto', ['only' => ['destroy']]);
    }
  
    public function index()
    {
        $productos = Producto::paginate('20');

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

   
    public function create()
    {
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }


    public function store(Request $request)
    {
        request()->validate(Producto::$rules);

      

        $producto = Producto::create([
            'id' => $request->id, 
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,

      
        ]);

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado.');
    }

   
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

  
    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

  
    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);


        $producto->update([
            'id' => $request->id, 
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
      
        ]);

       

        return redirect()->route('productos.index')
            ->with('success', 'Producto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
}
