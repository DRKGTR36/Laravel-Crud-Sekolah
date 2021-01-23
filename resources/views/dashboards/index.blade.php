@extends('layouts.master')

@section('content')
@if(auth()->user()->role == 'admin')
    <title>CRUD | Dashboard</title>
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ranking Siswa 3 Besar</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table table-bordered">
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
                                        @foreach(ranking3Besar() as $s)
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
                    <div class="col-md-3">
                        <a href="/siswa" class="stretched-link">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-user"></i></span>
                                <p>
                                    <span class="number">{{totalSiswa()}}</span>
                                    <span class="title">Total Siswa</span>
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="/guru" class="stretched-link">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-user"></i></span>
                                <p>
                                    <span class="number">{{totalGuru()}}</span>
                                    <span class="title">Total Guru</span>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
@else
    <title>CRUD | Dashboard</title>
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ranking Siswa 3 Besar</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>RANKING</th>
                                            <th>NAMA</th>
                                            <th>NILAI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $ranking = 1;
                                            @endphp
                                        @foreach(ranking3Besar() as $s)
                                        <tr>
                                            <td>{{$ranking}}</td>
                                            <td>{{$s->nama_lengkap()}}</td>
                                            <td>{{$s->rataRataNilai}}</td>
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
                    <div class="col-md-3">
                        <a href="#" class="stretched-link">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-user"></i></span>
                                <p>
                                    <span class="number">{{totalSiswa()}}</span>
                                    <span class="title">Total Siswa</span>
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="stretched-link">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-user"></i></span>
                                <p>
                                    <span class="number">{{totalGuru()}}</span>
                                    <span class="title">Total Guru</span>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
@endif

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    /* Make the image fully responsive */
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }
    </style>
</head>
<body>


<div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
        <li data-target="#demo" data-slide-to="3"></li>
        <li data-target="#demo" data-slide-to="4"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{config('sekolah.image_banner_url')}}" alt="Los Angeles" width="1100" height="500">
        </div>
        <div class="carousel-item">
            <img src="{{config('sekolah.image_banner_url')}}" alt="Chicago" width="1100" height="500">
        </div>
        <div class="carousel-item">
            <img src="{{config('sekolah.image_banner_url')}}" alt="New York" width="1100" height="500">
        </div>
        <div class="carousel-item">
            <img src="{{config('sekolah.image_banner_url')}}" alt="Chicago" width="1100" height="500">
        </div>
        <div class="carousel-item">
            <img src="{{config('sekolah.image_banner_url')}}" alt="New York" width="1100" height="500">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>

</body>
</html> --}}
