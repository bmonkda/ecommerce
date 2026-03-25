<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Relación uno a muchos inversa category - family
    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    //Relación uno a muchos category - subcategory
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
