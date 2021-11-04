@extends('layouts.main_admin')
@section('title', 'Edit Data Admin')
@section('container')
    <div class="container">
        <form action="{{ route('edit_admin',  $admin->user_id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama" 
                @if (old('nama'))
                    {{ old('nama') }}
                @else
                    value="{{ $admin->nama }}"
                @endif>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username"
                @if (old('username'))
                    {{ old('username') }}
                @else
                    value="{{ $admin->username }}"
                @endif>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-dark btn-md">Simpan</button>
        </form>
    </div>
@endsection