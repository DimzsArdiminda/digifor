<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKorban extends Model
{
    use HasFactory;

    protected $table = 'data_korban';
    protected $primaryKey = 'id_korban';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_korban',
        'kontak_korban',
        'alamat_korban',
        'deskripsi_kejadian',
    ];
}
