<?php

namespace App\Http\Controllers;

use App\Models\Carpeta;
use App\Models\Cliente;
use App\Models\Color;
use App\Models\Medida;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Pedido;
use App\Models\Pedidosotro;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class PedidoController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-pedido|crear-pedido|editar-pedido|borrar-pedido', ['only' => ['index']]);
        $this->middleware('permission:crear-pedido', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-pedido', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-pedido', ['only' => ['destroy']]);
    }




    public function index()
    {

        $pedidos = Order::paginate('25');



        return view('pedido.index', compact('pedidos'));
    }

    public function descargarPDF($id)
    {
        $pedido = Order::find($id);
        $clientes = Cliente::where('id', $pedido->cliente_id)->get();
        $fecha = Carbon::parse($pedido->fechaentrega);
        $mfecha = $fecha->month;
        $dfecha = $fecha->day;
        $afecha = $fecha->year;
        $now = Carbon::now();
        $otros = OrderProduct::where('order_id', $id)->get();



        $pdf = PDF::loadView('pedido.pdf', ['pedido' => $pedido, 'otros' => $otros, 'now' => $now, 'clientes' => $clientes, 'dfecha' => $dfecha, 'mfecha' => $mfecha, 'afecha' => $afecha])
            ->setPaper('a4', 'portrait');

            $pdf->render();
             
            return $pdf->stream("REMISION #$pedido->id $dfecha-$mfecha-$afecha.pdf", ['Attachment' => false]);;
        }

    public function verPDF($id)
    {
        $pedido = Order::find($id);
        $clientes = Cliente::where('id', $pedido->cliente_id)->get();
        $fecha = Carbon::parse($pedido->fechaentrega);
        $mfecha = $fecha->month;
        $dfecha = $fecha->day;
        $afecha = $fecha->year;
        $now = Carbon::now();
        $otros = OrderProduct::where('order_id', $id)->get();



        $pdf = PDF::loadView('pedido.pdf', ['pedido' => $pedido, 'otros' => $otros, 'now' => $now, 'clientes' => $clientes, 'dfecha' => $dfecha, 'mfecha' => $mfecha, 'afecha' => $afecha])
            ->setPaper('a4', 'portrait');

            
    
            
        return $pdf->stream("$pedido->id.pdf", ['Attachment' => false]);
    }


    public function create()
    {
        $pedido = new Pedido();
        // $clientes = Cliente::pluck('nombre', 'id');
        // $carpetas = Carpeta::pluck('nombrecarpeta', 'id');
        // $productos = Producto::pluck('nombre', 'id');
        // $medidas = Medida::pluck('nombremedida', 'id');
        // $colores = Color::pluck('nombrecolor', 'id');

        $clientes =  Cliente::all();
        $carpetas =  Carpeta::all();
        $productos = Producto::all();
        $medidas = Medida::all();
        $colores = Color::all();


        return view('pedido.create', compact('pedido', 'clientes', 'carpetas', 'productos', 'medidas', 'colores'));
    }


    public function store(Request $request)
    {

        $order = Order::create([
            'cliente_id' => $request->cliente_id,
            'carpeta_id' => $request->carpeta_id,
            'medida_id'  => $request->medida_id,
            'color_id'   => $request->color_id,
            'cantidadmedalla' => $request->cantidadmedalla,
            'cantidadcarpeta' => $request->cantidadcarpeta,
            'fechaentrega' => $request->fechaentrega,
            'estado'   => $request->estado
        ]);

     
        $orderproduct =   $request->producto_id;
    
        $count1 = count($orderproduct);
        

        for($i=0; $i < $count1; $i++){

      
            $datasave = [
                'order_id' =>$order->id,
                'producto_id' =>$request->producto_id[$i],
                'quantity' =>$request->quantity[$i],
            ];
            DB::table('order_producto')->insert($datasave);
         
            
        }


        return redirect()->route('pedidos.index');
    }


    public function show($id)
    {
        $pedido = Order::find($id);



        $fecha = Carbon::parse($pedido->fechaentrega);
        $mfecha = $fecha->month;
        $dfecha = $fecha->day;
        $afecha = $fecha->year;

        $clientes = Cliente::where('id', $id)->get();


        $otros = OrderProduct::where('order_id', $id)->get();



        return view('pedido.show', compact('pedido', 'fecha', 'mfecha', 'dfecha', 'afecha', 'clientes', 'otros'));
    }


    public function edit($id)
    {
        $pedido = Order::find($id);
        $productos = Producto::all();

        $clientes = Cliente::pluck('nombre', 'id');
        $carpetas = Carpeta::pluck('nombrecarpeta', 'id');
        $medidas = Medida::pluck('nombremedida', 'id');
        $colores = Color::pluck('nombrecolor', 'id');

        $otrosproductos = OrderProduct::where('order_id', $id)->get();

        


        return view('pedido.edit',  compact('pedido', 'clientes', 'carpetas', 'productos', 'medidas', 'colores','otrosproductos'));
    }


    public function update(Request $request, Order $pedido)
    {

        $order = Order::find($pedido->id);


        // dd($request->all());

        // dd($request->orderProducts[0]['producto_id']);

        $order->update([
            'cliente_id' => $request->cliente_id,
            'estado' => $request->estado,
            'fechaentrega' => $request->fechaentrega,
            'carpeta_id' => $request->carpeta_id,
            'color_id' => $request->color_id,
            'medida_id' => $request->medida_id,
            'cantidadmedalla' => $request->cantidadmedalla,
            'cantidadcarpeta' => $request->cantidadcarpeta,
        ]);


        $productoid = $request->producto_id;
        $quantityid = $request->quantity;

        $orderproduct =   OrderProduct::where('order_id', $pedido->id)->get();
        
        $count2 = count($orderproduct);

        // for ($i = 0; $i <  $count2; $i++) { 
         
        //     $orderproduct->producto_id = $productoid[1];
        //     $orderproduct->quantity = $quantityid[1];
        //     $orderproduct->save();

           

        // }
        OrderProduct::where('order_id', $pedido->id)->delete();
        
        $data = $request->all();
     

        if($request->producto_id) {
            foreach($data['producto_id'] as $item => $value) {
                $data2 = array(
                    'order_id' => $order->id,
                    'producto_id' => $data['producto_id'][$item],
                    'quantity' => $data['quantity'][$item],
                );
                
                OrderProduct::create($data2);

            }
        }


        return redirect()->route('pedidos.index');
    }


    public function destroy($id)
    {
        $pedido = Order::find($id)->delete();

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido deleted successfully');
    }
}
