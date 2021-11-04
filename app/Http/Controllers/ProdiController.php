<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403);
        }
        $data_prodi = Prodi::join('users', function ($join) {
            $join->on('users.id', '=', 'prodis.user_id')
                ->where('users.role', '=', 'prodi');
        })
            ->join('jurusans', function ($join) {
                $join->on('jurusans.id', '=', 'prodis.jurusan_id');
            })
            ->orderBy('prodis.created_at', 'desc')
            ->paginate(10);
        return view('prodi/prodi', compact('data_prodi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403);
        }
        $data_jurusan = Jurusan::all();
        return view('prodi/prodi_tambah', compact('data_jurusan'));
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
        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'prodi'
        ]);

        Prodi::create([
            'nama' => $request->nama,
            'jurusan_id' => $request->nama_jurusan,
            'user_id' => $user->id
        ]);

        return redirect()->route('data_prodi');
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
        //
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403);
        }
        $prodi = DB::table('users')
            ->join('prodis', 'users.id', '=', 'prodis.user_id')
            ->where('users.id', $id)
            ->first();

        $data_jurusan = Jurusan::all();

        return view('prodi/prodi_edit', compact(['prodi', 'data_jurusan']));
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
            ->join('prodis', 'users.id', '=', 'prodis.user_id')
            ->where('user_id', $id)
            ->update([
                'users.nama' => $request->nama,
                'prodis.nama' => $request->nama,
                'jurusan_id' => $request->nama_jurusan,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);
        return redirect()->route('data_prodi');
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
            ->join('prodis', 'users.id', '=', 'prodis.user_id')
            ->where('users.id', $id)
            ->delete();
        return redirect()->back();
    }
}
