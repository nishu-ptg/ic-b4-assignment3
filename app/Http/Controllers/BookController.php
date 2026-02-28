<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->join('categories', 'books.category_id', '=', 'categories.id')
            ->select(
                'books.*',
                'authors.name as author_name',
                'categories.name as category_name'
            )
            ->orderBy('books.created_at', 'desc')
            ->get();

//        return response()->json($books);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = DB::table('authors')
            ->where('status', 'active')->get();
        $categories = DB::table('categories')
            ->where('status', 'active')->get();

        return view('books.create', compact('authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'isbn' => 'required|unique:books,isbn',
            'category_id' => 'required|exists:categories,id',
            'author_id'  => 'required|exists:authors,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'published_at' => 'nullable|date',
            'status' => 'required|in:available,borrowed,reserved',
        ]);

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('covers', 'public');
        }

        DB::table('books')->insert([
            'title' => $request->title,
            'isbn' => $request->isbn,
            'category_id' => $request->category_id,
            'author_id' => $request->author_id,
            'cover_image' => $coverPath,
            'description' => $request->description,
            'published_at' => now()->toDateString(),
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
