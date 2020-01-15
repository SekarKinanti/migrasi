<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petugasModel extends Model
{
    protected $table="petugas";
    protected $primaryKey="id";
    public $timestamps=false;
}
