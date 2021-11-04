<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_mahasiswa = Mahasiswa::join('users', function ($join) {
            $join->on('users.id', '=', 'mahasiswas.user_id')
                ->where('users.role', '=', 'mahasiswa');
        })
            ->join('jurusans', function ($join) {
                $join->on('jurusans.id', '=', 'mahasiswas.jurusan_id');
            })
            ->orderBy('mahasiswas.created_at', 'desc')
            ->paginate(10);
        return view('mahasiswa/mahasiswa', compact('data_mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_jurusan = Jurusan::all();
        return view('mahasiswa/mahasiswa_tambah', compact('data_jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403);
        }
        // dd($request->all());
        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa'
        ]);

        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan_id' => $request->nama_jurusan,
            'angkatan' => $request->angkatan,
            'user_id' => $user->id
        ]);

        return redirect()->route('data_mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403);
        }
        $mahasiswa = DB::table('users')
            ->join('mahasiswas', 'users.id', '=', 'mahasiswas.user_id')
            ->where('users.id', $id)
            ->first();

        $data_jurusan = Jurusan::all();

        return view('mahasiswa/mahasiswa_edit', compact(['mahasiswa', 'data_jurusan']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403);
        }
        DB::table('users')
            ->join('mahasiswas', 'users.id', '=', 'mahasiswas.user_id')
            ->where('user_id', $id)
            ->update([
                'users.nama' => $request->nama,
                'mahasiswas.nama' => $request->nama,
                'nim' => $request->nim,
                'jurusan_id' => $request->nama_jurusan,
                'angkatan' => $request->angkatan,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);
        return redirect()->route('data_mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403);
        }
        DB::table('users')
            ->join('mahasiswas', 'users.id', '=', 'mahasiswas.user_id')
            ->where('users.id', $id)
            ->delete();
        return redirect()->back();
    }
}
