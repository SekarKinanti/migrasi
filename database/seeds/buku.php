<?php

use Illuminate\Database\Seeder;

class buku extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\bukuModel::insert([
            [
                'judul'=>'dilan 1990',
                'penerbit'=>'gramedia',
                'pengarang'=>'pidi baiq',
                'foto'=>'a',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ],[
                'judul'=>'dilan 1991',
                'penerbit'=>'gramedia',
                'pengarang'=>'pidi baiq',
                'foto'=>'b',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ],[
                'judul'=>'milea ',
                'penerbit'=>'gramedia',
                'pengarang'=>'pidi baiq',
                'foto'=>'c',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ],[
                'judul'=>'pulang ',
                'penerbit'=>'gramedia',
                'pengarang'=>'tere liye',
                'foto'=>'d',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ],[
                'judul'=>'pergi ',
                'penerbit'=>'gramedia',
                'pengarang'=>'tere liye',
                'foto'=>'e',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]
        ]);
    }
}
