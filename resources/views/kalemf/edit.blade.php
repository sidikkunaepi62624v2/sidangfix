@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Kategori Lembur</div>

                <div class="panel-body">
                    <a href="{{url('/Kategori_Lembur')}}" class="btn btn-success btn-block">Kembali</a><br>
                    {!! Form::model($kalemv,['method'=>'PATCH','route'=>['Kategori_Lembur.update',$kalemv->id]])!!}
                        <div class="form-group">
                            {!! Form::label('Kode Lembur','Kode Lembur')!!}
                            {!! Form::text('kode_lembur',null,['class'=>'form-control', 'required'])!!}
                        </div>
                        <div class="form-group">
                            <label for="jabatan_id" class="form-group">Nama Jabatan</label>
                            <div class="form-group">
                                <select name="jabatan_id" class="form-control" required>
                                    <option value="{{ $kalemv->jabatan->id }}">Nama Jabatan -- {{ $kalemv->jabatan->nama_jabatan }}</option>
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
                                    <option value="{{ $kalemv->golongan->id }}">Nama Golongan -- {{ $kalemv->golongan->nama_golongan }}</option>
                                    @foreach($golonganv as $data)
                                    <option value="{{$data->id}}">{{$data->nama_golongan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('Besaran Uang','Besaran Uang')!!}
                            {!! Form::number('besaran_uang',null,['class'=>'form-control', 'required'])!!}
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
