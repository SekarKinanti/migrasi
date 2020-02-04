<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anggotaModel extends Model
{
    protected $table="anggota";
    protected $primaryKey="id";
    protected $fillable=[
        "nama_anggota","alamat","telp"
    ];

    public function pinjam(){
        return $this->hasMany('App\Pinjam','id');
      }
}
