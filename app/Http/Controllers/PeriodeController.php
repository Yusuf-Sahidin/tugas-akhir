<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodeController extends Controller
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
        $data_periode = Periode::orderBy('created_at', 'desc')->paginate(10);
        return view('periode/periode', compact('data_periode'));
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
        return view('periode/periode_tambah');
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
        Periode::create([
            'periode' => $request->periode,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'yudisium' => $request->yudisium,
            'tanggal_yudisium' => $request->tanggal_yudisium,
        ]);

        return redirect()->route('data_periode');
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
        $periode = DB::table('periodes')
            ->where('periodes.id', $id)
            ->first();
        return view('periode/periode_edit', ['periode' => $periode]);
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
        DB::table('periodes')
            ->where('id', $id)
            ->update([
                'periode' => $request->periode,
                'tanggal_awal' => $request->tanggal_awal,
                'tanggal_akhir' => $request->tanggal_akhir,
                'yudisium' => $request->yudisium,
                'tanggal_yudisium' => $request->tanggal_yudisium,
            ]);
        return redirect()->route('data_periode');
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
        $admin = DB::table('periodes')
            ->where('periodes.id', $id)
            ->delete();
        return redirect()->back();
    }
}
