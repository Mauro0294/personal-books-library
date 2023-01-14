<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.add');
    }

    public function toggleRead(Request $request) {
        $book = Book::find($request->id);
        $book->read_at = $book->read_at ? null : now();
        $book->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:books|string',
            'author' => 'required|string',
        ]);        

        $book = new Book([
            'title' => $request->get('title'),
            'author' => $request->get('author'),
        ]);
        $book->save();
        return redirect('/books')->with('success', "'$book->title' has been created!");
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
        $book = Book::find($id);
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'Save':
                return $this->updateBook($request, $id);
            case 'Delete':
                return $this->destroy($id);
        }
    }

    public function updateBook($request, $id) {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
        ]);

        $book = Book::find($id);
        $book->title = $request->get('title');
        $book->author = $request->get('author');
        $book->read_at = $request->get('read_at') ? now() : null;
        $book->save();
        return redirect('/books')->with('success', "'$book->title' has been saved!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('/books')->with('success', "'$book->title' has been deleted!");
    }
}
