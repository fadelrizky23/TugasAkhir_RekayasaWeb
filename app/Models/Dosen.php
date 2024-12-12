<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosens'; // Nama tabel
    protected $fillable = [
        'nama', 
        'nidn', 
        'prodi'
    ];
}