<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenismobil_model extends Model
{
    protected $table="jenis_mobil";
    protected $primaryKey="id";
    public $timestamps= false;
    protected $fillable = [
    'nama_jenis',
  ];
}
