<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = ['user_id', 'kelas_id', 'absen', 'nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'alamat','tanggal_lahir', 'telpon', 'email', 'facebook', 'twitter', 'instagram', 'google_plus', 'github', 'avatar'];

    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }

    public function rataRataNilai(){
        //ambil nilai
        $total = 0;
        $hitung = 0;
        if ($this->mapel->isNotEmpty()) {
            foreach ($this->mapel as $mapel){
                $total += $mapel->pivot->nilai;
                $hitung++;
            }
        }
        return $total != 0 ? round($total/$hitung) : $total;
    }

    public function nama_lengkap()
    {
        return $this->nama_depan.' '.$this->nama_belakang;
    }
}
