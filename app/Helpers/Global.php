<?php

use App\Siswa;
use App\Guru;

function ranking3Besar()
{
    $siswa = Siswa::all();
        $siswa->map(function($s){
            $s->rataRataNilai = $s->rataRataNilai();
            return $s;
        });
        $siswa = $siswa->sortByDesc('rataRataNilai')->take(3);
    return $siswa;
}

function ranking()
{
    $siswa = Siswa::all();
        $siswa->map(function($s){
            $s->rataRataNilai = $s->rataRataNilai();
            return $s;
        });
        $siswa = $siswa->sortByDesc('rataRataNilai')->take(100);
    return $siswa;
}

function totalSiswa()
{
    return Siswa::count();
    
}

function totalGuru()
{
    return Guru::count();

}

function totalKelas()
{
    return Kelas::count();
}


