@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Penggajian</div>
                <div class="panel-body">

<a href="{{url('Penggajian/create')}}" class="btn btn-success form-control">Tambah Penggajian</a><br>
<center>{{$penggajianv->links()}}</center><br>
<table class="table table-hover table-bordered">
<thead>
    <tr>
        <td>No</td>
        <td>Photo</td>
        <td>Nama Pegawai</td>
        <td>NIP</td>
        <td >Status Pengambilan</td>
        <td colspan="2">Pilihan</td>
    </tr>
@php
$no=1 ;
@endphp
@foreach($penggajianv as $data)
@php
    ;
@endphp
<tbody>
    <tr>
        <td>{{$no++}}</td>
        <td><img src="{{asset('img/'.$data->tunjangan_pegawai->pegawai->photo.'')}}" width="75" height="75" class="img-rounded img-responsive" alt="Responsive image"></td>
        <td>{{$data->tunjangan_pegawai->pegawai->User->name}}</td>
        <td>{{$data->tunjangan_pegawai->pegawai->nip}}</td>
        <td>
            @if($data->tanggal_pengambilan == ""&&$data->status_pengambilan == "0")
                Belum Diambil
            @elseif($data->tanggal_pengambilan == ""||$data->status_pengambilan == "0")
                <center>Belum Diambil</center>
            <a class="btn btn-success btn-block" href="{{route('Penggajian.edit',$data->id)}}">Ambil</a>
            @else
                Sudah Diambil / {{$data->tanggal_pengambilan}}
            @endif
        <td>
            <a class="btn btn-info" href="{{route('Penggajian.show',$data->id)}}">Rincian</a>
        </td>
        <td>
            {!!Form::open(['method'=>'DELETE','route'=>['Penggajian.destroy',$data->id]])!!}
            {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
            {!!Form::close()!!}
        </td>
    </tr>
</tbody>
</thead>
@endforeach
</table>
</div>
</div>
</div>
</div>
@endsection