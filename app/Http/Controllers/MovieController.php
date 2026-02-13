<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Movie::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"       => "required|string|max:128",
            "year"        => "gt:1800|max:4",
            "description" => "filled|string|max:512",
            "price"       => "numeric:strict|decimal:0,2",
            "amount"      => "integer|numeric:strict|max:3|gte:0",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(movie $movie)
    {
        $id         = $movie->id;
        $foundMovie = Movie::find($id);

        return $foundMovie;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, movie $movie)
    {
        $request->validate([
            "title"       => "required|string|max:128",
            "year"        => "gt:1800|max:4",
            "description" => "filled|string|max:512",
            "price"       => "numeric:strict|decimal:0,2",
            "amount"      => "integer|numeric:strict|max:3|gte:0",
        ]);

        $id         = $movie->id;
        $foundMovie = Movie::find($id);
        $foundMovie->update($request->all());

        return $foundMovie;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(movie $movie)
    {
        $id         = $movie->id;
        $foundMovie = Movie::find($id);
        $foundMovie->delete();

        return response()->json([
            "Filmen har raderats.",
        ]);
    }
}
