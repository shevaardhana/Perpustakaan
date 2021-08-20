<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'categories_id',
        'kategori'
    ];

    public function books(){
        return $this->belongsTo(Book::class,'categories_id','id');
    }
}
