@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Rincian Gaji</div>
                    <div class="panel-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4"><br>
                                        <table class="table table-bordered"><td class="bg-success"><center>Photo</center></td></table><hr>
                                        <img src="{{asset('img/'.$penggajianv->tunjangan_pegawai->pegawai->photo.'')}}" width="Responsive" height="Responsive" class="img-rounded img-responsive" alt="Responsive image"><hr>
                                        <a href="{{url('Penggajian')}}" class="btn btn-success btn-block">Kembali</a>
                                    </div>
                                    <div class="col-md-4"><br>
                                        <table class="table table-bordered"><td class="bg-success"><center>Data Diri Pegawai</center></td></table><hr>
                                        <label>NIP</label>
                                        <input type="text" name="nip" value="{{$penggajianv->tunjangan_pegawai->pegawai->nip}}" class="form-control" readonly><br>
                                        <label>Nama</label>
                                        <input type="text" name="name" value="{{$penggajianv->tunjangan_pegawai->pegawai->user->name}}" class="form-control" readonly><br>
                                        <label>Jabatan</label>
                                        <input type="text" name="jabatan" value="{{$penggajianv->tunjangan_pegawai->tunjangan->jabatan->nama_jabatan}}" class="form-control" readonly><br>
                                        <label>Golongan</label>
                                        <input type="text" name="golongan" value="{{$penggajianv->tunjangan_pegawai->pegawai->golongan->nama_golongan}}" class="form-control" readonly>
                                        <hr>
                                    </div>
                                    <div class="col-md-4"><br>
                                        <table class="table table-bordered"><td class="bg-success"><center>Rincian Gaji</center></td></table><hr>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="bg-info">
                                                    <td>Gaji Lembur</td>
                                                    <td>Rp. {{number_format($penggajianv->jumlah_uang_lembur)}},-</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="bg-info">
                                                    <td>Gaji Pokok</td>
                                                    <td>Rp. {{number_format($penggajianv->gaji_pokok)}},-</td>
                                                </tr>
                                                <tr class="bg-info">
                                                    <td>Tunjangan</td>
                                                    <td>Rp. {{number_format($penggajianv->tunjangan_pegawai->tunjangan->besaran_uang)}},-</td>
                                                </tr>
                                                <tr class="bg-info">
                                                    <td>---------------------------------</td>
                                                    <td>--------------------------------- +</td>
                                                </tr>
                                                <tr class="bg-success">
                                                    <td>Total Gaji</td>
                                                    <td>Rp. {{number_format($penggajianv->total_gaji)}},-</td>
                                                </tr>
                                                <tr class="bg-warning">
                                                    <td>Keterangan</td>
                                                    <td>
                                                        @if($penggajianv->tanggal_pengambilan == ""&&$penggajianv->status_pengambilan == "0")
                                                            Belum Diambil
                                                        @elseif($penggajianv->tanggal_pengambilan == ""||$penggajianv->status_pengambilan == "0")
                                                            Belum Diambil
                                                        @else
                                                            Sudah Diambil / {{$penggajianv->tanggal_pengambilan}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="bg-danger">
                                                        @if($penggajianv->tanggal_pengambilan == ""&&$penggajianv->status_pengambilan == "0")
                                                            Belum Diambil
                                                        @elseif($penggajianv->tanggal_pengambilan == ""||$penggajianv->status_pengambilan == "0")
                                                            <a class="btn btn-success btn-block" href="{{route('Penggajian.edit',$penggajianv->id)}}">Ambil</a>
                                                        @else
                                                            Sudah Diambil / {{$penggajianv->tanggal_pengambilan}}
                                                        @endif</b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
    </div>
</div>  
@endsection