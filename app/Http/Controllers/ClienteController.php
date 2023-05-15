<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;

class ClienteController extends Controller
{
  function listar()
  {
    $clientes = Cliente::orderBy('id')->paginate(1);
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
