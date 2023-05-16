<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vagas;
use App\Models\Ticket;
use App\Models\Carro;
use App\Models\Tipo;

class VagasController extends Controller
{
  function listar()
  {
    $vagas = Vagas::orderBy('id')->paginate(12);
    $carros = Carro::orderBy('id')->get();
    $tipos = Tipo::orderBy('id')->get();
    return view('vagas', compact('vagas', 'carros', 'tipos'));
  }

  public function deletar($id)
  {
    Vagas::findOrFail($id)->delete();
    return redirect()->back()->with('success', 'Vaga deletada com sucesso');
  }

  public function criar(Request $request)
  {
    $vaga = new Vagas();
    $vaga->estado = true;
    $vaga->save();

    return redirect()->back()->with('success', 'Vaga criada com sucesso');
  }

  function novo()
  {

    if (isset($_POST['cadastrado'])) {
      $carro = new Carro();
      $carro->placa = $_POST['placa'];
      $carro->cliente_id = 0;

      $carro_id = DB::table('carro')->insertGetId(['placa' => $carro->placa, 'cliente_id' => $carro->cliente_id]);
    } else {
      $carro_id = $_POST['carro_id'];
    }

    $tipo_id = $_POST['tipo_id'];
    $vaga_id = $_POST['vaga_id'];

    var_dump($carro_id, $tipo_id, $vaga_id);


    $result = DB::select('select inserir_ticket(?,?,?,?)', [$carro_id, $vaga_id, $tipo_id, true]);
    return redirect()->route('tickets');
  }
}
