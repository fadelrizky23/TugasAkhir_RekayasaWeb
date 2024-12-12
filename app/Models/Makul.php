<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makul extends Model
{
    use HasFactory;

    protected $table = 'makuls'; // Nama tabel
    protected $fillable = [
        'nama', 
        'kode', 
        'sks'
    ];
}