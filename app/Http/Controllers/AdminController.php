<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
        // $data_admin = Admin::all();
        // $data_admin = DB::table('users')
        //     ->join('admins', 'users.id', '=', 'admins.user_id')
        //     ->where('users.role', 'admin')
        //     ->offset(5)
        //     ->limit(5)
        //     ->get();
        $data_admin = User::join('admins', 'users.id', '=', 'admins.user_id')
            ->where('users.role', 'admin')
            // ->offset(0)
            // ->limit(5)
            ->orderBy('admins.created_at', 'desc')
            ->paginate(10);
        return view('admin/admin', compact('data_admin'));
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
        return view('admin/admin_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403);
        }
        // dd($request->all());
        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);

        Admin::create([
            'nama' => $request->nama,
            'user_id' => $user->id
        ]);

        return redirect()->route('data_admin');
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
        $admin = DB::table('users')
            ->join('admins', 'users.id', '=', 'admins.user_id')
            ->where('users.id', $id)
            ->first();
        // dd($admin);
        return view('admin/admin_edit', ['admin' => $admin]);
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
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);
        DB::table('admins')
            ->where('user_id', $id)
            ->update([
                'nama' => $request->nama
            ]);
        return redirect()->route('data_admin');
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
        $admin = DB::table('users')
            ->join('admins', 'users.id', '=', 'admins.user_id')
            ->where('users.id', $id)
            ->delete();
        return redirect()->back();
    }
}
