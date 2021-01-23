@extends('layouts.master')

@section('content')
<title>CRUD | Siswa - Index</title>
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><b>Data Siswa</b></h3>
                                    <div class="right">
                                        <a href="/siswa/exportexcel" class="btn btn-success fa fa-download"></a>
                                        <a href="/siswa/exportpdf" class="btn btn-danger fa fa-download"></a>
                                        <a href="#importSiswa"  class="btn btn-success fa fa-upload" data-toggle="modal"></a>
                                        <a href="#exampleModal"  class="btn btn-sm btn-primary" data-toggle="modal">Tambah Data Siswa</a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ABSEN</th>
                                                <th class="text-center">NAMA DEPAN</th>
                                                <th class="text-center">NAMA BELAKANG</th>
                                                <th class="text-center">JENIS KELAMIN</th>
                                                <th class="text-center">AGAMA</th>
                                                <th class="text-center">ALAMAT</th>
                                                <th class="text-center">RATA RATA NILAI</th>
                                                <th class="text-center">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_siswa as $siswa)
                                                <tr>
                                                    <td class="text-center">{{ $siswa->absen }}</td>
                                                    <td class="text-center"><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_depan }}</a></td>
                                                    <td class="text-center"><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_belakang }}</a></td>
                                                    <td class="text-center">{{ $siswa->jenis_kelamin }}</td>
                                                    <td class="text-center">{{ $siswa->agama }}</td>
                                                    <td class="text-center">{{ $siswa->alamat }}</td>
                                                    <td class="text-center">{{ $siswa->rataRataNilai() }}</td>
                                                    <td class="text-center">
                                                        <a href="/siswa/{{$siswa->id}}/profile" class="btn btn-sm btn-info fa fa-eye"></a>
                                                        <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-sm btn-warning fa fa-sliders"></a>
                                                        <a href="#" class="btn btn-sm btn-danger btn delete fa fa-trash" siswa-id="{{$siswa->id}}"></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Ranking Siswa</b></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">RANKING</th>
                                    <th class="text-center">NAMA</th>
                                    <th class="text-center">NILAI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $ranking = 1;
                                    @endphp
                                @foreach(ranking() as $s)
                                <tr>
                                    <td class="text-center">{{$ranking}}</td>
                                    <td class="text-center">{{$s->nama_lengkap()}}</td>
                                    <td class="text-center">{{$s->rataRataNilai}}</td>
                                </tr>
                                @php
                                    $ranking++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Import Siswa -->
    <div class="modal fade" id="importSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Siswa</h5>
            </div>
            <div class="modal-body">
                {!!Form::open(['route' => 'siswa.import', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'])!!}

                {!!Form::file('data_siswa')!!}
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-sm btn-primary" value="Import">
                </form>
            </div>
        </div>
        </div>
    </div>

    {{-- MODAL  --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/siswa/create" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group{{$errors->has('absen') ? ' has-error' : ''}}">
                            <label for="exampleInputEmail1">Absen</label>
                            <input name="absen" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Absen" value="{{old('absen')}}">
                            @if($errors->has('absen'))
                                <span class="help-block">{{$errors->first('absen')}}</span>
                            @endif
                        </div>

                        <h3><b>Data Diri</b></h3>

                        <div class="form-group{{$errors->has('nama_depan') ? ' has-error' : ''}}">
                            <label for="exampleInputEmail1">Nama Depan</label>
                            <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('nama_depan')}}">
                            @if($errors->has('nama_depan'))
                                <span class="help-block">{{$errors->first('nama_depan')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('nama_belakang') ? ' has-error' : ''}}">
                            <label for="exampleInputEmail1">Nama Belakang</label>
                            <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{old('nama_belakang')}}">
                            @if($errors->has('nama_belakang'))
                                <span class="help-block">{{$errors->first('nama_belakang')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">
                            @if($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                <option value="L"{{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-laki</option>
                                <option value="P"{{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option>
                            </select>
                            @if($errors->has('jenis_kelamin'))
                                <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('agama') ? ' has-error' : ''}}">
                            <label for="exampleInputEmail1">Agama</label>
                            <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{old('agama')}}">
                            @if($errors->has('agama'))
                                <span class="help-block">{{$errors->first('agama')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('alamat') ? ' has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" {{old('alamat')}}></textarea>
                            @if($errors->has('alamat'))
                                <span class="help-block">{{$errors->first('alamat')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('tanggal_lahir') ? ' has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" {{old('tanggal_lahir')}}>
                            @if($errors->has('tanggal_lahir'))
                                <span class="help-block">{{$errors->first('tanggal_lahir')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('telpon') ? ' has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Telpon</label>
                            <input name="telpon" type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" {{old('telpon')}}>
                            @if($errors->has('telpon'))
                                <span class="help-block">{{$errors->first('telpon')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Email</label>
                            <input name="email" type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" {{old('email')}}>
                            @if($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>

                        <h3><b>Akun Sosial</b></h3>

                        <div class="form-group{{$errors->has('facebook') ? ' has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Facebook</label>
                            <input name="facebook" type="link" class="form-control" id="exampleFormControlTextarea1" rows="3" {{old('facebook')}}>
                            @if($errors->has('facebook'))
                                <span class="help-block">{{$errors->first('facebook')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('twitter') ? ' has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Twitter</label>
                            <input name="twitter" type="link" class="form-control" id="exampleFormControlTextarea1" rows="3" {{old('twitter')}}>
                            @if($errors->has('twitter'))
                                <span class="help-block">{{$errors->first('twitter')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('instagram') ? ' has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Instagram</label>
                            <input name="instagram" type="link" class="form-control" id="exampleFormControlTextarea1" rows="3" {{old('instagram')}}>
                            @if($errors->has('instagram'))
                                <span class="help-block">{{$errors->first('instagram')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('google_plus') ? ' has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Google+</label>
                            <input name="google_plus" type="link" class="form-control" id="exampleFormControlTextarea1" rows="3" {{old('google_plus')}}>
                            @if($errors->has('google_plus'))
                                <span class="help-block">{{$errors->first('google_plus')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('github') ? ' has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Github</label>
                            <input name="github" type="link" class="form-control" id="exampleFormControlTextarea1" rows="3" {{old('github')}}>
                            @if($errors->has('github'))
                                <span class="help-block">{{$errors->first('github')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('avatar') ? ' has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Avatar</label>
                            <input type="file" name="avatar" class="form-control">
                            @if($errors->has('avatar'))
                                <span class="help-block">{{$errors->first('avatar')}}</span>
                            @endif
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script>
        $('.delete').click(function(){
            var siswa_id = $(this).attr('siswa-id');
                swal({
                    title: "Yakin ?",
                    text: "mau hapus data siswa dengan id "+siswa_id + " ??",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/siswa/"+siswa_id+"/delete";
                }
            });
        });
    </script>
@stop
