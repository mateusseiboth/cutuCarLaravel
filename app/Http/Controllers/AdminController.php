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
        $vagas = Vagas::orderBy('id')->paginate(9)->appends('tab', 'vagas');
        $tipos = Tipo::orderBy('id')->paginate(1)->appends('tab', 'tipos');
        $usuarios = Usuario::orderBy('id')->paginate(1)->appends('tab', 'usuarios');

        return view('admin', compact('vagas', 'tipos', 'usuarios'));
    }
}
