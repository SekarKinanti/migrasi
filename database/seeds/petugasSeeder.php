<?php

use Illuminate\Database\Seeder;

class petugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\petugasModel::insert([
            [
                'nama_petugas'=>'abel',
                'alamat'=>'malang',
                'telp'=>'08123456789',
                'username'=>'abel',
                'password'=>'abel123',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ],[
                'nama_petugas'=>'adam',
                'alamat'=>'by',
                'telp'=>'08123456789',
                'username'=>'adam',
                'password'=>'adam123',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ],[
                'nama_petugas'=>'saddam',
                'alamat'=>'jkt',
                'telp'=>'08123456789',
                'username'=>'saddam',
                'password'=>'saddam123',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ],[
                'nama_petugas'=>'vito',
                'alamat'=>'bdg',
                'telp'=>'08123456789',
                'username'=>'vito',
                'password'=>'vito123',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ],[
                'nama_petugas'=>'salman',
                'alamat'=>'sda',
                'telp'=>'08123456789',
                'username'=>'salman',
                'password'=>'salman123',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]
        ]);
    }
}
