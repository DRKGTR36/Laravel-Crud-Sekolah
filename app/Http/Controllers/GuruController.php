<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\User;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_guru = \App\Guru::where('nama', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_guru = \App\Guru::all();
        }
        return view('guru.index', ['data_guru' => $data_guru]);
    }

    public function profile($id)
    {
        $guru = Guru::find($id);
        return view('guru.profile',['guru' => $guru]);
    }
}
