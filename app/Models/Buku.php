<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'photo',
        'deskripsi',
        'kategori_id',
        'tanggal_terbit',
        'stock'
    ];

    public function kategori_list()
    {
        return $this->belongsToMany(kategori::class, 'kategori_id');
    }

    public function getPhotoAttribute($value){
        return url('storage/' . $value);
    }
}
