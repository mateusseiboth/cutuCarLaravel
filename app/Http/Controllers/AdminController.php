<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vagas;
use App\Models\Tipo;
use App\Models\Usuario;

class AdminController extends Controller
{
    function listar() {
        $vagas = Vagas::orderBy('id')->get();
        $tipos = Tipo::orderBy('id')->get();
        $usuarios = Usuario::orderBy('id')->get();
        return view('admin',
                      compact('vagas', 'tipos', 'usuarios'));
      }
}
