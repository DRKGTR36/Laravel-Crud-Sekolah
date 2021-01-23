<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Mail\NotifPendaftaranSiswa;

class SiteController extends Controller
{
    public function home()
    {
        $posts = Post::all();
        return view('sites.home',compact(['posts']));
    }

    public function about()
    {
        return view('sites.about');
    }

    public function register()
    {
        return view('sites.register');
    }

    public function postregister(Request $request)
    {
        // input pendaftaran sebagai user dulu
        $user = new \App\User;
        $user->role = 'siswa';
        $user->nama = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        // $user->remember_token = str_random(60);
        $user->save();

        // Insert ke table Siswa
        $request->request->add(['user_id' => $user->id ]);
        $siswa = \App\Siswa::create($request->all());

        // \Mail::raw('Selamat datang '.$user->nama, function ($message) use($user) {
        //     $message->to('$user->email', $user->nama);
        //     $message->subject('Selamat anda sudah terdaftar di Sekolah kami');
        // });

        \Mail::to($user->email)->send(new NotifPendaftaranSiswa);
        return redirect('/')->with('sukses', 'Data Pendaftaran Berhasil dikirim');
    }

    public function singlepost($slug)
    {
        $post = Post::where('slug','=',$slug)->first();
        // dd($post);
        return view('sites.singlepost',compact(['post']));
    }
}
