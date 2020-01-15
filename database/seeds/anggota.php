<?php

use Illuminate\Database\Seeder;

class anggota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\anggotaModel::insert([
        [
            'nama_anggota'=>'sekar',
            'alamat'=>'malang',
            'telp'=>'081334508760',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ],[
            'nama_anggota'=>'iqbaal',
            'alamat'=>'sidoarjo',
            'telp'=>'08123456789',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ],[
            'nama_anggota'=>'kinanti',
            'alamat'=>'jakarta',
            'telp'=>'081334508760',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ],[
            'nama_anggota'=>'angga',
            'alamat'=>'surabaya',
            'telp'=>'081334508760',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ],[
            'nama_anggota'=>'reza ',
            'alamat'=>'bandung',
            'telp'=>'081334508760',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]
        ]);
    }
}
