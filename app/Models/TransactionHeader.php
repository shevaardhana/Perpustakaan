<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeaders extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_induk_siswa',
        'nama',
        'email',
        'no_tlp',
        'alamat',
        'tanggal_pinjam',
        'tanggal_pengembalian',
        'lama_pinjam',
        'users_id',
        'status'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'users_id');
    }

    public function details()
    {
        return $this->hasMany(TransactionDetails::class, 'transaksi_header_id');
    }
}
