<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Book::with('category')->get();
        return view('backend.pages.Buku.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('backend.pages.Buku.create')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);

        $data['photo'] = $request->file('photo')->store(
            'assets/books', 'public'
        );

        Book::create($data);
        Alert::success('Success', 'Berhasil menambahkan Data Buku terbaru');
        return redirect()->route('buku.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $item = Book::find($id);

        return view('backend.pages.Buku.edit')->with([
            'categories' => $categories,
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);

        $data['photo'] = $request->file('photo')->store(
            'assets/image', 'public'
        );

        $item = Book::find($id);
        $item->update($data);

        Alert::info('Success', 'Berhasil Update Data Buku');
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Book::find($id);
        $item->delete();

        Book::where('categories_id', $id)->delete();

        Alert::info('Success', 'Berhasil Delete Data Kategori');
        return redirect()->route('buku.index');
    }
}
