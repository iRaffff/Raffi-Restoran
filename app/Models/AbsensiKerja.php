<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiKerja extends Model
{
    use HasFactory;
    protected $table = 'absensi_kerja';
    protected $fillable = ['nama_karyawan', 'tanggal_masuk', 'waktu_masuk', 'status', 'waktu_selesai_kerja'];
}
