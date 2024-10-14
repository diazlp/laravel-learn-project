<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Book;
use App\Models\Borrower;

class BookController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('category')->get(); // Eager load the category relationship

        return view('book.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();

        return view('book.create', ['categories' => $categories]);
    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|max:255', // Title is required and should not exceed 255 characters
        'summary' => 'required|max:1000', // Summary is required and should not exceed 1000 characters
        'release_year' => 'required|integer|between:1900,' . date('Y'), // Year is required, must be an integer, and must be between 1900 and current year
        'stock' => 'required|integer|min:0', // Stock is required, must be a non-negative integer
        'category_id' => 'required|exists:categories,id', // Category ID is required and must exist in the categories table
    ]);

    $book = new Book;
 
    $book->title = $request->title;
    $book->summary = $request->summary;
    $book->release_year = $request->release_year;
    $book->stock = $request->stock;
    $book->category_id = $request->category_id;
    $book->created_at = now();
    $book->updated_at = now();

    $book->save();

    return redirect()->route('book.index')->with('success', 'Book added successfully!');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        
        return view('book.detail', ['book' => $book]);
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
        $categories = Category::get();

        return view('book.edit', ['book' => $book, 'categories' => $categories]);
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
        $validated = $request->validate([
            'title' => 'required|max:255', // Title is required and should not exceed 255 characters
            'summary' => 'required|max:1000', // Summary is required and should not exceed 1000 characters
            'release_year' => 'required|integer|between:1900,' . date('Y'), // Year is required, must be an integer, and must be between 1900 and current year
            'stock' => 'required|integer|min:0', // Stock is required, must be a non-negative integer
            'category_id' => 'required|exists:categories,id', // Category ID is required and must exist in the categories table
        ]);
    
        $book = Book::find($id);

        $book->title = $request->title;
        $book->summary = $request->summary;
        $book->release_year = $request->release_year;
        $book->stock = $request->stock;
        $book->category_id = $request->category_id;
        $book->updated_at = now();
    
        $book->save();

         return redirect()->route('book.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::destroy($id);

        return redirect()->route('book.index')->with('success', 'Book deleted successfully!');
        
    }

    public function borrow($id)
    {
        $book = Book::find($id);

        // Check if the book is available
        if ($book->stock <= 0) {
            return redirect()->back()->withErrors(['msg' => 'This book is currently not available.']);
        }

        // Create a new Borrower record
        Borrower::create([
            'tanggal_peminjaman' => now(),
            'tanggal_kembali' => now()->addDays(365),
            'book_id' => $book->id,
            'user_id' => Auth::id(),
        ]);

        $book->decrement('stock');

        return redirect()->route('book.show', $book->id)->with('success', 'Book borrowed successfully! It is due back in 365 days.');
    }
}
