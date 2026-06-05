<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Movie;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category_connections', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Movie::class, "movieid")->constrained()->onDelete("cascade");
            $table->foreignIdFor(Category::class, "categoryid")->constrained()->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_connections');
    }
};
