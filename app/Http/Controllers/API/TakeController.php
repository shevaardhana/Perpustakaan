<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;
use App\Http\Requests\API\TakeRequest;
use Illuminate\Http\Request;

class TakeController extends Controller
{
    public function take(TakeRequest $request)
    {
        $data = $request->except('transaction_details');

        $transaction = TransactionHeader::create($data);

        foreach($request->transaction_details as $book)
        {
            $details[] = new TransactionDetail([
                'transaction_headers_id' => $transaction->id,
                'books_id' => $book,
                'jumlah_buku' => $book->jumlah_buku
            ]);
        }

        $transaction->details()->saveMany($details);

        return ResponseFormatter::success($transaction);
    }
}
