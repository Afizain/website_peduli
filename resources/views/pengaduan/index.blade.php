@extends('layouts.app')
@section('title', 'Data Pengaduan')
@section('content')

{{-- <div class="">
    <form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-success" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
</div>
<br> --}}


<div class="card shadow mb-4">
    <div class="card-header py-3">

        {{-- @foreach ($data_diri as $data_diri) --}}
        <h6 
        class="m-0 font-weight-bold text-dark">
            {{ $data_diri->first()->profile->nama_lengkap }}
            {{-- <br>
            Ketua {{ $data_diri->status }}            
            <br>RT {{ $data_diri->profile->rt }} - RW {{ $data_diri->profile->rw }} --}}
        </h6>
        {{-- @endforeach             --}}

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Id Aduan</th>
                        <th>Isi Pengaduan</th>
                        <th>Bukti Foto</th>
                        <th>Nama Pengirim</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
               
                <tbody>
                    @php
                        ($no = 1)
                    @endphp

                    @foreach ($pengaduan as $row)
                        <tr>
                            <th>{{ $no++}}</th>
                            <td>AD{{ $row->id_aduan}}</td>
                            <td>{{ $row->statement}}</td>
                            <td><img src="{{ $row->bukti_foto}}" alt="img" style="width:100px;"></td>                            
                            <td>{{$row->user->username}}</td>      
                            <td>
                                <a href="" class="btn btn-info">ajukan ke rw</a>
                                <a href="" class="btn btn-success">kirim tanggapan</a>
                                <a href="" class="btn btn-danger">tolak aduan</a>                                
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection