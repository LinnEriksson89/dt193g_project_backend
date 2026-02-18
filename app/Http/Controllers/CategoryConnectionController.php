<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryConnection;

class CategoryConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryConnection::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "categoryid" => "required",
            "movieid"    => "required",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryConnection $connection)
    {
        $id              = $connection->id;
        $foundConnection = CategoryConnection::find($id);

        return $foundConnection;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryConnection $connection)
    {
        $request->validate([
            "categoryid" => "required",
            "movieid"    => "required",
        ]);

        $id              = $connection->id;
        $foundConnection = CategoryConnection::find($id);
        $foundConnection->update($request->all());

        return $foundConnection;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryConnection $connection)
    {
        $id              = $connection->id;
        $foundConnection = CategoryConnection::find($id);
        $foundConnection->delete();

        return response()->json([
            "Filmen har tagits bort ur kategorin.",
        ]);
    }
}
