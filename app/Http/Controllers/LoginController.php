<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function listar()
    {
    }

    public function login()
    {
        return view('auth/login');
    }
    public function logar(){
        $username = $_POST['username'];
        $senha = $_POST['password'];
        $senha =  base64_encode($senha);
        $usuario = Usuario::where('username', $username)->where('password', $senha)->first();
        if (null != $usuario){
            session(['logado' => $usuario]);
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }

    public function deslogar(){
        session(['logado' => null]);
        return redirect()->route('login');
    }
}
