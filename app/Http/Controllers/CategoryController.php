<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"        => "required|string|max:64",
            "description" => "filled|string|max:128",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(category $cat)
    {
        $id       = $cat->$id;
        $foundCat = Category::find($id);

        return $foundCat;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $cat)
    {
        $request->validate([
            "name"        => "required|string|max:64",
            "description" => "filled|string|max:128",
        ]);

        $id       = $cat->$id;
        $foundCat = Category::find($id);
        $foundCat->update($request->all());

        return $foundCat;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $cat)
    {
        $id       = $cat->$id;
        $foundCat = Category::find($id);
        $foundCat->delete();

        return response()->json([
            "Kategorin har raderats.",
        ]);
    }
}
