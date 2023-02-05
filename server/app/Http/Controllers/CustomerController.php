<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        // $books = Book::where('name', 'LIKE', "%{$request->keyword}%")
        //     ->orderBy('id', 'desc')
        //     ->get();

        // return view('book.index')->with([
        //     'books' => $books,
        //     'keyword' => $request->keyword,
        // ]);
        return view('customer.index');
    }

    // public function create()
    // {
    //     return view('book.create');
    // }

    // public function store(Request $request)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $book = new Book;
    //         $book->fill($request->all())->save();

    //         $book_history = new BookHistory;
    //         $book_history->fill($request->all());
    //         $book_history->book_id = $book->id;
    //         $book_history->save();

    //         DB::commit();
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //     }

    //     return redirect('/')->with('message', '図書を登録しました');
    // }

    // public function edit(Book $book)
    // {
    //     return view('book.edit')->with(
    //         ['book' => $book]
    //     );
    // }

    // public function update(Request $request, Book $book)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $book->fill($request->all())->save();

    //         $book_history = new BookHistory;
    //         $book_history->fill($request->all());
    //         $book_history->book_id = $book->id;
    //         $book_history->save();

    //         DB::commit();
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //     }

    //     return redirect('/')->with('message', '図書を編集しました');
    // }

    // public function destroy(Book $book)
    // {
    //     $book->delete();
    //     return redirect('/')->with('message', '図書を削除しました');
    // }

    // public function history(Book $book)
    // {
    //     $book_histories = BookHistory::where('book_id', $book->id)
    //         ->orderBy('id', 'desc')
    //         ->get();

    //     return view('book.history')->with([
    //         'book_histories' => $book_histories,
    //     ]);
    // }
}
