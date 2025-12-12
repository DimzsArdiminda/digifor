<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TindakanForensik extends Model
{
    protected $table = 'tindakan_forensik';

    protected $guarded = [];

    // karena id adalah UUID
    public $incrementing = false;
    protected $keyType = 'string';

    public function kasus()
    {
        return $this->belongsTo(Kasus::class, 'id_kasus');
    }
}
