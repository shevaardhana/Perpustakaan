<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'photo',
        'deskripsi',
        'categories_id',
        'tanggal_terbit',
        'stock'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'categories_id','id');
    }

    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }
}
