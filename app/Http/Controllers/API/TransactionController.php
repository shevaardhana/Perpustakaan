<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransactionHeader;

class TransactionController extends Controller
{
    public function get(Request $request, $id)
    {
        $book = TransactionHeader::with('details.book')->find($id);

        if($book)
            return ResponseFormatter::success($book, 'Data transaksi Berhasil Diambil');

        else
            return ResponseFormatter::error(null, 'Data transaksi tidak ada', 404);
    }
}
