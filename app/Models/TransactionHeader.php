<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_siswa',
        'nama',
        'tanggal_pinjam',
        'tanggal_pengembalian',
        'status'
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_headers_id');
    }
}
