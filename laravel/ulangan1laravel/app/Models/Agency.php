<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'jenis',
        'luas_tanah',
        'luas_bangunan',
        'lantai',
        'kamar_tidur',
        'kamar_mandi',
        'garasi',
        'air',
        'listrik',
        'hadap',
        'alamat',
        'harga',
        'marketing',
        'no_hp_marketing',
    ];
    
    public $timestamps = false;
}
