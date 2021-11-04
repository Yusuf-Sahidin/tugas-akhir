<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuanganController extends Controller
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
        $data_ruangan = Ruangan::orderBy('created_at', 'desc')->paginate(10);
        return view('ruangan/ruangan', compact('data_ruangan'));
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
        return view('ruangan/ruangan_tambah');
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
        Ruangan::create([
            'lantai' => $request->lantai,
            'nama' => $request->nama
        ]);

        return redirect()->route('data_ruangan');
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
        $ruangan = DB::table('ruangans')
            ->where('ruangans.id', $id)
            ->first();
        return view('ruangan/ruangan_edit', ['ruangan' => $ruangan]);
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
        DB::table('ruangans')
            ->where('id', $id)
            ->update([
                'lantai' => $request->lantai,
                'nama' => $request->nama,
            ]);
        return redirect()->route('data_ruangan');
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
        $ruangan = DB::table('ruangans')
            ->where('ruangans.id', $id)
            ->delete();
        return redirect()->back();
    }
}
