@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Pegawai</div>

                <div class="panel-body">
                    <a href="{{url('/Pegawai')}}" class="btn btn-success btn-block">Kembali</a><br>
                    {!! Form::model($pegawaiv,['method'=>'PATCH','route'=>['Pegawai.update',$pegawaiv->id],'files'=>'true'])!!}
                        <label>NIP</label>
                        <input type="text" name="nip" value="{{$pegawaiv->nip}}" class="form-control" required><br>

                        <div class="form-group">
                            <label for="jabatan_id" class="form-group">Nama Jabatan</label>
                            <div class="form-group">
                                <select name="jabatan_id" class="form-control" required>
                                    <option value="{{ $pegawaiv->jabatan->id }}">Nama Jabatan ( {{ $pegawaiv->jabatan->nama_jabatan }} ) </option>
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
                                    <option value="{{ $pegawaiv->golongan->id }}">Nama Golongan ( {{ $pegawaiv->golongan->nama_golongan }} ) </option>
                                    @foreach($golonganv as $data)
                                        <option value="{{$data->id}}">{{$data->nama_golongan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="photo" class="form-group">Photo</label>
                                <input type="file" name="photo" class="form-control" nullable>
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
