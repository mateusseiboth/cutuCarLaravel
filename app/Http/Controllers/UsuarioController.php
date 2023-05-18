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
        $imageData = base64_encode(file_get_contents($image));
        $usuario->image = $imageData;
      }

      $usuario->save();
      return redirect()->back()->with('success', 'Usuário criado com sucesso.');
    } catch (\Illuminate\Database\QueryException $e) {
      dd($e->getMessage());
    }
  }

  public function getUserImage($id)
  {
    $user = Usuario::findOrFail($id);

    if ($user->imagem) {
      $imagePath = public_path('images/' . $user->imagem);
      $imageData = file_get_contents($imagePath);

      return response($imageData, 200)->header('Content-Type', 'image/jpeg');
    }

    // Retorne uma imagem padrão se o usuário não tiver imagem definida
    $defaultImagePath = public_path('images/default.jpg');
    $defaultImageData = file_get_contents($defaultImagePath);

    return response($defaultImageData, 200)->header('Content-Type', 'image/jpeg');
  }
}
