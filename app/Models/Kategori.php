<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'kategori'
    ];

    public function buku(){
        return $this->belongsTo(Buku::class,'kategori_id','id');
    }
}
