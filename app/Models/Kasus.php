<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kasus extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'kasus';

    public function korban()
    {
        return $this->belongsTo(DataKorban::class, 'id_korban', 'id');
    }
}