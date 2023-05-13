<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Vagas;
use App\Models\Tipo;
use App\Models\Usuario;

class AdminController extends Controller
{
    function listar() {
        $vagas = Vagas::orderBy('id')->paginate(9);
        $tipos = Tipo::orderBy('id')->paginate(9);
        $usuarios = Usuario::orderBy('id')->paginate(9);

        return view('admin', compact('vagas', 'tipos', 'usuarios'));
    }
}
