<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Carro;

class CarroController extends Controller
{
    function listar(){
        $carros = Carro::orderByRaw('id')->get();
        return view('carros',
                      compact('carros'));
    }
}
