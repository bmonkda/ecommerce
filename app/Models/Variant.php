<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    //Relación uno a muchos inversa variant - product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relación muchos a muchos variant - feature
    public function features()
    {
        return $this->belongsToMany(Feature::class)
            ->withTimestamps();
    }
}
