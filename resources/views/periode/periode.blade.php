@extends('layouts.main_admin')
@section('title', 'Data Periode')
@section('container')
    <a type="button" class="btn btn-dark btn-md btn_loc" href="{{ route('hal_tambah_periode') }}">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Tambah Data</span>
    </a>
    <div class="container tabel_container">
        <table class="table">
            <tr>
                <td class="col-md-1">No</td>
                <td class="col-md-1">Periode Sidang ke-</td>
                <td class="col-md-2">Tanggal Awal</td>
                <td class="col-md-2">Tanggal Akhir</td>
                <td class="col-md-1">periode Yudisium ke-</td>
                <td class="col-md-2">Tanggal Yudisium</td>
                <td class="col-md-2 center">Action</td>
            </tr>
            @foreach ($data_periode as $no => $data)
                <tr>
                    <td>{{ $data_periode->firstItem()+$no }}</td>
                    <td>{{ $data -> periode }}</td>
                    <td>{{ $data -> tanggal_awal }}</td>
                    <td>{{ $data -> tanggal_akhir }}</td>
                    <td>{{ $data -> yudisium }}</td>
                    <td>{{ $data -> tanggal_yudisium }}</td>
                    <td class="center">
                        <a href="{{ route('hal_edit_periode', $data->id) }}" type="submit" class="btn btn-warning">Edit</a>
                        <form action="{{ route('hapus_periode', $data->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $data_periode->links() }}
    </div>
@endsection