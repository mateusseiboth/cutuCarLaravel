<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Usuario;

class UsuarioController extends Controller
{
  public function criarUsuario(Request $request)
  {
    try {
      $request->validate([
        'username' => 'required|unique:usuario',
        'password' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg|max:2048',
      ]);

      $usuario = new Usuario();
      $usuario->username = $request->username;
      $usuario->password = bcrypt($request->password);

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $destinationPath = public_path('images');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);
        $usuario->image = $imageName;
      }

      $usuario->save();
      return redirect()->back()->with('success', 'Usuário criado com sucesso.');
    } catch (\Illuminate\Database\QueryException $e) {
      dd($e->getMessage());
    }
  }
  public function deletar($id)
  {
    $usuario = Usuario::findOrFail($id);
    $usuario->delete();
    return redirect()->back()->with('success', 'Usuário deletado com sucesso.');
  }
}
