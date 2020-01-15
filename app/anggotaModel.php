<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anggotaModel extends Model
{
    protected $table="anggota";
    protected $primaryKey="id";
    public $timestamps=false;
}
