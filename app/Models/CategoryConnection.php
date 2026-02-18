<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryConnection extends Model
{    
    protected $fillable = [
        "categoryid",
        "movieid",
    ];
}
