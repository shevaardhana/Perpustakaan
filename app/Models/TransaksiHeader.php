<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_induk_siswa',
        'nama',
        'email',
        'no_tlp',
        'alamat',
        'tanggal',
        'lama_pinjam',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function details()
    {
        return $this->hasMany(TransaksiDetail::class, 'transaksi_header_id');
    }
}
