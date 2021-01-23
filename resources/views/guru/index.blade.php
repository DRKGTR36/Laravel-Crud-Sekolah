@extends('layouts.master')

@section('content')
<title>CRUD | Guru - Index</title>
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><b>Data Guru</b></h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">NAMA</th>
                                                <th class="text-center">TELPON</th>
                                                <th class="text-center">ALAMAT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_guru as $guru)
                                                <tr>
                                                <td class="text-center">{{ $guru->id }}</td>
                                                <td class="text-center"><a href="/guru/{{$guru->id}}/profile">{{ $guru->nama }}</a></td>
                                                    <td class="text-center">{{ $guru->telpon }}</td>
                                                    <td class="text-center">{{ $guru->alamat }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

