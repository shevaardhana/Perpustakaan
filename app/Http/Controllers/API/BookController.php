<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $judul = $request->input('judul');
        $slug = $request->input('slug');
        $category = $request->input('categories');

        if($id)
        {
            $book = Book::with('category')->find($id);

            if($book)
                return ResponseFormatter::success($book, 'Data buku Berhasil diambil');

            else
                return ResponseFormatter::error(null, 'Data buku tidak ada', 404);
        }

        if($slug)
        {
            $book = Book::all()->where('slug', $slug)->first();

            if($book)
                return ResponseFormatter::success($book, 'Data Buku Berhasil diambil');

            else
                return ResponseFormatter::error(null, 'Data Buku tidak ada', 404);
        }

        $book = Book::with('category');

        if($judul)
            $book->where('judul', 'like', '%'. $judul .'%');

        if($category->kategori)
            $book->where('judul', 'like', '%'. $category->kategori .'%');

        return ResponseFormatter::success(
            $book->paginate($limit),
            'data list buku berhasil diambil'
        );
    }
}

