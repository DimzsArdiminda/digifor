<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataKorban extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'data_korban';

    public function kasus()
    {
        return $this->hasMany(Kasus::class, 'id_korban', 'id');
    }
}