<?php

namespace App\Http\Controllers;

use App\Http\Resources\Books as BooksResource;
use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BooksResource::collection(Books::all());
        //$books = Books::get()->toJson();
        //return response($books, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Books;
        $book->name = $request->name;
        $book->category = $request->category;
        $book->save();

        return response()->json([
            "data" => $book
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Books $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $books)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Books $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Books $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $books)
    {
        $books = Books::find($request->id);
        $books->name = is_null($request->name) ? $books->name : $request->name;
        $books->category = is_null($request->category) ? $books->category : $request->category;

        if ($books->save()) {
            return response()->json([
                "message" => "records updated successfully",
                "data" => $books
            ], 200);
        } else {
            return response()->json([
                "message" => "Book not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Books $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $book)
    {
        $book->delete();
        return response()->json(null, 204);
    }
}
