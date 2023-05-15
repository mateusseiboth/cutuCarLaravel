<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vagas;

class VagasController extends Controller
{
  function listar()
  {
    $vagas = Vagas::orderBy('id')->paginate(12);
    return view('vagas', compact('vagas'));
  }

  public function deletar($id)
  {
    Vagas::findOrFail($id)->delete();
    return redirect()->back()->with('success', 'Vaga deletada com sucesso');
  }

  public function criar(Request $request)
  {
    $vaga = new Vagas();
    $vaga->estado = true; // Define o estado da vaga como "true"
    $vaga->save();

    return redirect()->back()->with('success', 'Vaga criada com sucesso');
  }
}
