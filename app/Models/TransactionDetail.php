<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_headers_id',
        'books_id'
    ];

    public function Header()
    {
        return $this->belongsTo(TransactionHeader::class, 'transaction_headers_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'books_id', 'id');
    }
}
