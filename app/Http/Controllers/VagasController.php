<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vagas;

class VagasController extends Controller
{
    function listar() {
        $vagas = Vagas::orderBy('id')->get();
        return view('vagas',
                      compact('vagas'));
      }
}
