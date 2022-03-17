<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuridCovid extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nis',
        'kelas',
        'tanggal_mulai_gejala',
        'hasil_antigen',
        'hasil_vcr',
        'gejala',
    ];

    protected $table = 'murid_covid';
}
