@extends('layouts.master')

@section('content')
<title>CRUD | Siswa - Edit Profile</title>
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                            <h1><b>Edit Data Siswa</b></h1>
                            @if(session('sukses'))
                                <div class="alert alert-success" role="alert">
                                    {{session('sukses')}}
                                </div>
                            @endif
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Depan</label>
                                                <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Belakang</label>
                                                <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                                <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                                    <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                                    <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Agama</label>
                                                <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Alamat</label>
                                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->alamat}}</textarea>
                                            </div>

                                            <h2><b>Sosial</b></h2>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Facebook</label>
                                                <textarea name="facebook" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->facebook}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Twitter</label>
                                                <textarea name="twitter" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->twitter}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Instagram</label>
                                                <textarea name="instagram" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->instagram}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Google+</label>
                                                <textarea name="google_plus" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->google_plus}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Github</label>
                                                <textarea name="github" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->github}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Avatar</label>
                                                <input type="file" name="avatar" class="form-control">
                                            </div>
                                            <button>
                                                <a type="submit" class="btn btn-warning btn-sm">Update</a>
                                            </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div


@endsection
