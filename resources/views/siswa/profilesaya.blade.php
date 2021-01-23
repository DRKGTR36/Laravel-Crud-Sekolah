@extends('layouts.master')

@section('header')
@stop
@section('content')
<title>CRUD | Profile </title>
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                    {{session('sukses')}}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
            @endif
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img width="100" height="100" src="{{$siswa->getAvatar()}}" width="150px" height="150px" class="img-circle" alt="Avatar">
                                <h3 class="name"><b>{{$siswa->nama_depan}} {{$siswa->nama_belakang}}</b></h3>
                                <span class="online-status status-available">Available</span>
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-4 stat-item">
                                        {{$siswa->mapel->count()}}<span>Mata Pelajaran</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        {{$siswa->rataRataNilai()}}<span>Rata-rata Nilai</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        2174 <span>Points</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Data Diri</h4>
                                <ul class="list-unstyled list-justify">
                                    <li>Jenis Kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
                                    <li>Agama <span>{{$siswa->agama}}</span></li>
                                    <li>Alamat <span>{{$siswa->alamat}}</span></li>
                                    <li>Tanggal Lahir <span>{{$siswa->tanggal_lahir}}</span></li>
                                    <li>Telpon <span>{{$siswa->telpon}}</span></li>
                                    <li>Email <span>{{$siswa->email}}</span></li>
                                </ul>
                            </div>
                            <div class="profile-info">
                                <h4 class="heading">Sosial</h4>
                                <ul class="list-inline social-icons">
                                    <li><a target="_blank" href="{{$siswa->facebook}}" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                    <li><a target="_blank" href="{{$siswa->twitter}}" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                    <li><a target="_blank" href="{{$siswa->instagram}}" class="instagram-bg"><i class="fa fa-instagram"></i></a></li>
                                    <li><a target="_blank" href="{{$siswa->google_plus}}" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a target="_blank" href="{{$siswa->github}}" class="github-bg"><i class="fa fa-github"></i></a></li>
                                </ul>
                            </div>
                            <div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning fa fa-sliders"></a></div>
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title"><b>Mata Pelajaran</b></h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">KODE</th>
                                            <th class="text-center">NAMA</th>
                                            <th class="text-center">SEMESTER</th>
                                            <th class="text-center">NILAI</th>
                                            <th class="text-center">GURU</th>
                                            <th class="text-center">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($siswa->mapel as $mapel)
                                        <tr>
                                            <td class="text-center">{{$mapel->kode}}</td>
                                            <td class="text-center">{{$mapel->nama}}</td>
                                            <td class="text-center">{{$mapel->semester}}</td>
                                            <td class="text-center"><a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Masukkan nilai">{{$mapel->pivot->nilai}}</a></td>
                                            <td class="text-center"><a href="/guru/{{$mapel->guru_id}}/profile">{{$mapel->guru->nama}}</a></td>
                                            <td class="text-center"><a href="/siswa/{{$siswa->id}}/{{$mapel->id}}/deletenilai" class="btn btn-danger fa fa-trash" onclick="return confirm('Yakin Ingin Menghapus Data?')"></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                <div class="panel">
                                    <div id="chartNilai"></div>
                                </div>
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
@stop

@section('footer')
<script>

</script>
@stop
