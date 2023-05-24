<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Carro;
use App\Models\Cliente;

class CarroController extends Controller
{
    function listar()
    {

        if(Carro::exists()){
            $carros = Carro::orderByRaw('id')->paginate(6);
            $clientes = Cliente::orderByRaw('id')->get();
        }
        else {
            $carros = [];
            $clientes = [];
        }
        return view('carros', compact('carros', 'clientes'));
    }

    public function criar(Request $request)
    {
        $carro = new Carro;
        $carro->placa = $request->input('placa');
        $carro->cliente_id = $request->input('cliente_id');
        $carro->save();

        return redirect('/carros')->with('success', 'Carro criado com sucesso');
    }

    public function editar(Request $request, $id)
    {
        $carro = Carro::find($id);
        $carro->placa = $request->input('placa');
        $carro->cliente_id = $request->input('cliente_id');
        $carro->save();

        return back()->with('success', 'Carro editado com sucesso');
    }

    public function deletar($id)
    {
        $carro = Carro::find($id);
        $carro->delete();

        return redirect('/carros')->with('success', 'Carro excluído com sucesso');
    }
}
