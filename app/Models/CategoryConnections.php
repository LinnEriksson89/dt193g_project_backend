<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryConnections extends Model
{    
    protected $fillable = [
        "categoryid",
        "movieid",
    ];
}
