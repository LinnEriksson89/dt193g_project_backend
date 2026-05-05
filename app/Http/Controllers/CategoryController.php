<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "categoryname"        => "required|string|max:64",
            "categorydescription" => "filled|string|max:128",
        ]);

        return Category::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        $id      = $category->id;
        $foundCat = Category::find($id);

        return $foundCat;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
            "categoryname"        => "required|string|max:64",
            "categorydescription" => "filled|string|max:128",
        ]);

        $id       = $category->id;
        $foundCat = Category::find($id);
        $foundCat->update($request->all());

        return $foundCat;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $id       = $category->id;
        $foundCat = Category::find($id);
        $foundCat->delete();

        return response()->json([
            "Kategorin har raderats.",
        ]);
    }
}
