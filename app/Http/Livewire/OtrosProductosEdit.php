<?php

namespace App\Http\Livewire;

use App\Models\Carpeta;
use App\Models\Cliente;
use App\Models\Color;
use App\Models\Medida;
use App\Models\OrderProduct;
use App\Models\Producto;
use Livewire\Component;

class OtrosProductosEdit extends Component
{

    public $orderProducts = [];
    public $allProducts = [];

    public $clientes = [];
    public $carpetas = [];
    public $colores = [];
    public $medidas = [];

    public $cantidadcarpeta;
    public $cantidadmedalla;

    public $estado;

    public $pedido;

    public $otro = [];

    public $selectedproduct;


    public function render()
    {
        info($this->orderProducts);
        $otrosproductos = $this->otro;

     

        
        return view('livewire.otros-productos-edit');
    }




    public function mount($id)
    {


        // $this->otros = Pedidosotro::all();
        $this->clientes  = Cliente::all();
        $this->carpetas  = Carpeta::all();
        $this->colores  = Color::all();
        $this->medidas  = Medida::all();
        $this->allProducts  = Producto::all();
        $this->otro = OrderProduct::where('order_id', $id->id)->get();



        $otrosproductos = $this->otro;
 
        foreach ($otrosproductos as $key => $otro) {

            $this->orderProducts[$key] = [
                [
                    'producto_id' =>  $otro->producto_id,
                    'quantity' => $otro->quantity
                ]
            ];
        }
    }



    public function addProduct()
    {
      
      $this->orderProducts[] = ['producto_id' => '', 'quantity' => 1];

    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    
}
