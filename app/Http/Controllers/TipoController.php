<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    public function criar(Request $request)
    {
        $request->validate([
            'descr' => 'required',
            'preco' => 'required|numeric',
        ]);

        $tipo = new Tipo();
        $tipo->descr = $request->input('descr');
        $tipo->preco = $request->input('preco');
        $tipo->save();

        return redirect()->back()->with('success', 'Tipo de cobrança adicionado com sucesso.');
    }

    public function deletar($id)
    {
        $tipo = Tipo::find($id);

        if ($tipo) {
            $tipo->delete();

            return redirect()->back()->with('success', 'Tipo de cobrança excluído com sucesso.');
        }

        return redirect()->back()->with('error', 'Tipo de cobrança não encontrado.');
    }
}
