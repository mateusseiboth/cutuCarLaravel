<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;

class ClienteController extends Controller
{
  function listar()
  {

    $totalClientes = Cliente::count();

    if ($totalClientes == 1 && Cliente::where('id', 0)->exists()) {
        $clientes = [];

    } else {

        $clientes = Cliente::where('id', '!=', 0)->orderBy('id')->paginate(6);

    }



    return view('clientes', compact('clientes'));
  }

  function criarCliente(Request $request)
  {
    $validatedData = $request->validate([
      'nome' => 'required|string',
      'cpf' => 'required|string',
      'telefone' => 'required|string',
    ]);

    $cliente = new Cliente;
    $cliente->nome = $validatedData['nome'];
    $cliente->cpf = $validatedData['cpf'];
    $cliente->telefone = $validatedData['telefone'];
    $cliente->ativo = true;
    $cliente->save();

    return redirect()->back()->with('success', 'Cliente criado com sucesso!');
  }

  public function editarCliente(Request $request, $id)
  {
    $cliente = Cliente::find($id);

    if ($cliente) {
      $validatedData = $request->validate([
        'nome' => 'required|string',
        'cpf' => 'required|string',
        'telefone' => 'required|string',
      ]);

      $cliente->nome = $validatedData['nome'];
      $cliente->cpf = $validatedData['cpf'];
      $cliente->telefone = $validatedData['telefone'];
      $cliente->save();

      return back()->with('success', 'Cliente editado com sucesso');
    }

    return back()->with('error', 'Cliente não encontrado');
  }


  function alterarEstadoCliente($id)
  {
    $cliente = Cliente::find($id);

    if ($cliente) {

      $cliente->ativo = !$cliente->ativo;
      $cliente->save();

      return redirect()->back()->with('success', 'Estado do cliente alterado com sucesso!');
    }

    return redirect()->back()->with('error', 'Cliente não encontrado.');
  }
}
