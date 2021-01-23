<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Siswa;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_siswa = \App\Siswa::where('nama_depan', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_siswa = \App\Siswa::all();
        }
        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
        // Validation
        // dd($request->all());
        $this->validate($request,[
            'absen' => 'required',

            'nama_depan' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'avatar' => 'mines:jpg,png',
        ]);

        // Insert ke table Users
        $user = new \App\User;
        $user->role = 'siswa';
        $user->nama = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        // $user->remember_token = str_random(60);
        $user->save();

        // Insert ke table Siswa
        $request->request->add(['user_id' => $user->id ]);
        $siswa = \App\Siswa::create($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data Siswa berhasil ditambahkan!');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa/edit', ['siswa' => $siswa]);
    }

    public function update(Request $request,Siswa $siswa)
    {
        // dd($request->all());
        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data Berhasil Diubah');
    }

    public function delete(Siswa $siswa)
    {
        // dd($siswa->all);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses', 'Data Berhasil Dihapus');
    }

    public function profile(Siswa $siswa)
    {
        $matapelajaran = \App\Mapel::all();

        // Menyiapkan data untuk chart
        $categories = [];
        $data = [];

        foreach($matapelajaran as $mp){
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
            }
        }

        // dd($data);
        // dd(json_encode($categories));
        //dd($matapelajaran);
        return view('siswa.profile',['siswa' => $siswa,'matapelajaran' => $matapelajaran,'categories' => $categories,'data' => $data]);
    }

    public function addnilai(Request $request,$idsiswa)
    {
        $siswa = \App\Siswa::find($idsiswa);
        if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
            return redirect('siswa/'.$idsiswa.'/profile')->with('sukses', 'Nilai mata pelajaran sudah ada');
        }
        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);

        return redirect('siswa/'.$idsiswa.'/profile')->with('sukses', 'Nilai Berhasil ditambahkan');
    }

    public function deletenilai($idsiswa,$idmapel)
    {
        $siswa = \App\Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses', 'Data nilai berhasil dihapus');
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }

    public function exportPdf()
    {
        $siswa = \App\Siswa::all();
        $pdf = PDF::loadView('export.siswapdf',['siswa' => $siswa]);
        return $pdf->download('siswa.pdf');
    }

    public function profilesaya()
    {
        $siswa = auth()->user()->siswa;
        return view('siswa.profilesaya', compact(['siswa']));
    }

    public function importexcel(Request $request)
    {
        Excel::import(new \App\Imports\SiswaImport,$request->file('data_siswa'));
        // dd($request->all());
    }
}




