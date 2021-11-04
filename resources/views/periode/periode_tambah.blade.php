@extends('layouts.main_admin')
@section('title', 'Tambah Data Periode')
@section('container')
    <div class="container">
        <form action="{{ route('tambah_periode') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="periode">Periode Ke-</label>
                <input type="text" class="form-control" name="periode" placeholder="Periode Ke-">
            </div>
            <div class="form-group">
                <label for="tanggal_awal">Tanggal Awal</label>
                <input type="date" class="form-control" name="tanggal_awal">
            </div>
            <div class="form-group">
                <label for="tanggal_akhir">Tanggal Akhir</label>
                <input type="date" class="form-control" name="tanggal_akhir">
            </div>
            <div class="form-group">
                <label for="periode">Yudisium Ke-</label>
                <input type="text" class="form-control" name="yudisium" placeholder="Yudisium Ke-">
            </div>
            <div class="form-group">
                <label for="tanggal_yudisium">Tanggal Yudisium</label>
                <input type="date" class="form-control" name="tanggal_yudisium">
            </div>
            <button type="submit" class="btn btn-dark btn-md">Simpan</button>
        </form>
    </div>
@endsection