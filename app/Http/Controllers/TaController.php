<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Ta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaController extends Controller
{
    //
    public function create()
    {
        $ta = Ta::all();
        return view('user/user_mahasiswa/bimbingan', compact('ta'));
    }

    public function store(Request $request)
    {
        $id = Auth::id();
        $a = Mahasiswa::select('id')->where('user_id', $id)->first()->id;
        // dd($a);
        $ta = Ta::create([
            'mahasiswa_id' => $a,
            'judul_ta' => $request->judul_ta,
            'dosen_id' => $request->dosen
        ]);
        return redirect()->route('bimbingan');
    }
}
