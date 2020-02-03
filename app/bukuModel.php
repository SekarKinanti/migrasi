<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bukuModel extends Model
{
    protected $table="buku";
    protected $primaryKey="id";
    protected $fillable=[
        "judul","penerbit","pengarang","foto"
    ];
}
