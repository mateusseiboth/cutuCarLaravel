<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;

class ClienteController extends Controller
{
    function listar() {
        $clientes = Cliente::orderBy('id')->get();
        return view('clientes',
                      compact('clientes'));
      }
}
