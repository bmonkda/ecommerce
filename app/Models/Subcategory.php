<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //Relación uno a muchos inversa subcategory - category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Relación uno a muchos subcategory - product
    public function products()
    {
        return $this->hasMany(Product::class);
    }


}
