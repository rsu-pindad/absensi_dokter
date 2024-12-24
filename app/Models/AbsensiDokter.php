<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AbsensiDokter extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'absensi_dokter';

    protected $fillable = [
        'user_id',
        'user_latitude',
        'user_longitude',
        'user_radius',
        'user_photo',
    ];

    protected $hidden = [
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
