<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    protected $table = 'barang';

     protected $fillable = [
        'id_barang', 'nama_barang', 'kategori_barang','satuan','stok_barang'
    ];
}
