<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    // Relación muchos a muchos option - products
    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('value') // Si se quiere incluir el valor de la opción en la tabla pivote
            ->withTimestamps(); // Si se quiere incluir timestamps en la tabla pivote
    }

    // Relación uno a muchos option - feature
    public function features()
    {
        return $this->hasMany(Feature::class);
    }

}
