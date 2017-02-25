@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Kategori Lembur</div>

                <div class="panel-body">
                    <a href="{{url('/Kategori_Lembur')}}" class="btn btn-success btn-block">Kembali</a><br>
                    {!! Form::open(['url'=>'Kategori_Lembur'])!!}
                    <div class="form-group">
                        {!! Form::label('Kode Lembur','Kode Lembur')!!}
                        {!! Form::text('kode_lembur',null,['class'=>'form-control', 'placeholder' => 'Contoh: kole-100', 'required'])!!}
                    </div>
                    <label>Nama Jabatan</label>
                    <select name="jabatan_id" class="form-control" required>
                        <option value="">Pilih Nama Jabatan</option>
                        @foreach($jabatanv as $data)
                        <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
                        @endforeach
                    </select><br>
                    <label>Nama Golongan</label>
                    <select name="golongan_id" class="form-control" required="">
                        <option value="">Pilih Nama Golongan</option>
                        @foreach($golonganv as $data)
                        <option value="{{$data->id}}">{{$data->nama_golongan}}</option>
                        @endforeach
                    </select><br>
                    <div class="form-group">
                        {!! Form::label('Besaran Uang','Besaran Uang')!!}
                        {!! Form::number('besaran_uang',null,['class'=>'form-control', 'required'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('save',['class'=>'btn btn-success form-control'])!!}
                    </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
