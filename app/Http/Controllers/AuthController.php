<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Este método solo se encarga de mostrar la vista.
    public function showLoginForm()
    {
        return view('login');
    }

    // Este es el método que recibe la información del formulario y la procesa.
    // Reemplaza a tu archivo 'login_process.php'
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                $user = Auth::user();

                if ($user->rol == 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($user->rol == 'tecnico') {
                    return redirect()->route('tecnico.dashboard');
                }
                // Redirección para el rol 'usuario' (el dashboard por defecto)
                return redirect()->route('usuario.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Las credenciales no son correctas.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
