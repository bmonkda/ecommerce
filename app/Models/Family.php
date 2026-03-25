<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    // relación uno a muchos family - category
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
