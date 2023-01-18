<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $pedidosData = Order::select(DB::raw("COUNT(*) as count"))
        ->whereYear("created_at", date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

        return view('home', compact('pedidosData'));
    }
}
