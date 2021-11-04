<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserMahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        //
        if (!auth()->check() || auth()->user()->role !== 'mahasiswa') {
            abort(403);
        }
        return view('user/user_mahasiswa/dashboard');
    }

    public function bimbingan()
    {
        if (!auth()->check() || auth()->user()->role !== 'mahasiswa') {
            abort(403);
        }
        return view('user/user_mahasiswa/bimbingan');
    }
}
