<?php

namespace App\Http\Livewire;

use App\Models\Carpeta;
use App\Models\Cliente;
use App\Models\Color;
use App\Models\Medida;
use App\Models\Pedido;
use App\Models\Producto;
use Livewire\Component;

class OtrosProductos extends Component
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



    public function render()
    {
        info($this->orderProducts);
        return view('livewire.otros-productos');
    }




    public function mount()
    {
        // $this->otros = Pedidosotro::all();
        $this->clientes  = Cliente::all();
        $this->carpetas  = Carpeta::all();
        $this->colores  = Color::all();
        $this->medidas  = Medida::all();
        $this->allProducts  = Producto::all();

        $this->orderProducts = [
            ['producto_id' => '', 'quantity' => 1]
        ];
    }

    public function store(){

        Pedido::create([
            'cliente_id' => $this->clientes,
            'carpeta_id' => $this->carpetas,
            'color_id' => $this->colores,
            'medida_id' => $this->medidas,
            'cantidadmedalla' => $this->cantidadmedalla,
            'cantidadcarpeta' => $this->cantidadcarpeta,
            'fechaentrega' => $this->fechaentrega,
            'estado' => $this->estado,

        ]);

        session()->flash('success', 'Pedido creado!');
    }

    public function addProduct(){

        $this->orderProducts[] = ['producto_id' => '', 'quantity' => 1];


    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }
    


 
}



