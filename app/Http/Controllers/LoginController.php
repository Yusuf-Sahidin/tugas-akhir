<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        //
        return view('welcome');
    }

    public function authenticate(Request $request)
    {
        $cre = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // dd('berhasil login');
        if (Auth::attempt($cre)) {
            $request->session()->regenerate();
            $role = Auth::user()->role;
            switch ($role) {
                case 'admin':
                    return redirect()->intended('admin');
                    break;
                case 'mahasiswa':
                    return redirect()->intended('mahasiswa');
                    break;
                case 'dosen':
                    return redirect()->intended('dosen');
                    break;
                case 'prodi':
                    return redirect()->intended('prodi');
                    break;

                default:
                    return redirect()->route('login');
                    break;
            }
        }
        return back()->with('loginError', 'Login Error!');
    }
    protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo()
    {
        $role = Auth::user()->role;
        switch ($role) {
            case 'admin':
                return redirect()->route('admin');
                break;
            case 'mahasiswa':
                return redirect()->route('mahasiswa');
                break;

            default:
                return redirect()->route('login');
                break;
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
