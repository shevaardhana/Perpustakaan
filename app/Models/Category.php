<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori'
    ];

    public function listCategory(){
        return $this->hasMany(Book::class, 'categories_id');
    }
}
