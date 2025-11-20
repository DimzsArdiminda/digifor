<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class DetailUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'detail_user';
    public $incrementing = false; 
    protected $keyType = 'string';
    protected $fillable = [
        'nama',
        'email',
        'photo',
        'role',
        'google_token',
        'google_refresh_token',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) \Illuminate\Support\Str::uuid();
            }
        });
    }
}
