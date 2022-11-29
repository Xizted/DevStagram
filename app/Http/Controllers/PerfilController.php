<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => 'required|unique:users,username,' . auth()->user()->id . '|min:3|max:20',
            'email' => 'required|unique:users,email,' . auth()->user()->id . '|email|max:60',
            'password' => 'confirmed|min:6',
            'new_password' => 'min:6',
            'new_password_confirmation' => 'same:new_password'
        ]);

        if (!auth()->attempt(["email" => auth()->user()->email, "password" => $request->password])) {
            return back()->with('mensaje', 'Contraseña Incorrecta');
        };

        if ($request->imagen) {
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = Image::make($imagen);

            $imagenServidor->fit(1000, 1000);

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;

            $imagenServidor->save($imagenPath);
        }


        $usuario = User::find(auth()->user()->id);

        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;

        if ($request->new_password) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();


        return redirect()->route('posts.index', $usuario->username);
    }
}
