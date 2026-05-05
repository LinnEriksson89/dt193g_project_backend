<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryConnection;
use App\Models\Movie;

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
        
        return CategoryConnection::create($request->all());
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

    /*Get all categorys a movie is connected to*/
    public function getMoviesInCategories ($movieId) {
        
        $result = CategoryConnection::where('movieid', $movieId)->get();

        if(!$result -> isEmpty()) {
            return $result;
        } else {
            return response()->json([
                "Filmen verkar inte tillhöra några kategorier."
            ], 404);
        }
    }

}
