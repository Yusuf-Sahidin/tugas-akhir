@extends('layouts.main_admin')
@section('title', 'Data Admin')
@section('container')
    <a type="button" class="btn btn-dark btn-md btn_loc" href="{{ route('hal_tambah_admin') }}">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Tambah Data</span>
    </a>
    <div class="container tabel_container">
        <table class="table">
            <tr>
                <td class="col-md-1">No</td>
                <td class="col-md-2">Nama</td>
                <td class="col-md-2">Username</td>
                <td class="col-md-2 center">Action</td>
            </tr>
            @foreach ($data_admin as $no => $data)
                <tr>
                    <td>{{ $data_admin->firstItem()+$no }}</td>
                    <td>{{ $data -> nama }}</td>
                    <td>{{ $data -> username }}</td>
                    <td class="center">
                        <a href="{{ route('hal_edit_admin', $data->user_id) }}" type="submit" class="btn btn-warning">Edit</a>
                        <form action="{{ route('hapus_admin', $data->user_id) }}" method="POST" class="d-inline">
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
        {{ $data_admin -> links() }}
    </div>
@endsection