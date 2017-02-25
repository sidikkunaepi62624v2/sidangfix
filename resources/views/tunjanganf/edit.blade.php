@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Tunjangan</div>

                <div class="panel-body">
                    <a href="{{url('/Tunjangan')}}" class="btn btn-success btn-block">Kembali</a><br>
                    {!! Form::model($tunjanganv,['method'=>'PATCH','route'=>['Tunjangan.update',$tunjanganv->id]])!!}
                        <div class="form-group">
                            {!! Form::label('Kode Tunjangan','Kode Tunjangan')!!}
                            {!! Form::text('kode_tunjangan',null,['class'=>'form-control', 'required'])!!}
                        </div>
                        <div class="form-group">
                            <label for="jabatan_id" class="form-group">Nama Jabatan</label>
                            <div class="form-group">
                                <select name="jabatan_id" class="form-control" required>
                                    <option value="{{ $tunjanganv->jabatan->id }}">Nama Jabatan ( {{ $tunjanganv->jabatan->nama_jabatan }} )  </option>
                                    @foreach($jabatanv as $data)
                                        <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="golongan_id" class="form-group">Nama Golongan</label>
                            <div class="form-group">
                                <select name="golongan_id" class="form-control" required>
                                    <option value="{{ $tunjanganv->golongan->id }}">Nama Golongan ( {{ $tunjanganv->golongan->nama_golongan }} ) </option>
                                    @foreach($golonganv as $data)
                                        <option value="{{$data->id}}">{{$data->nama_golongan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('Status','Status')!!}
                            {!! Form::text('status',null,['class'=>'form-control', 'required'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Jumlah Anak','Jumlah Anak')!!}
                            {!! Form::text('jumlah_anak',null,['class'=>'form-control', 'required'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Besaran Uang','Besaran Uang')!!}
                            {!! Form::text('besaran_uang',null,['class'=>'form-control', 'required'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('update',['class'=>'btn btn-success form-control'])!!}
                        </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
