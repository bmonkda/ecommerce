<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // asignación masiva
    protected $fillable = ['sku', 'name', 'description', 'image_path', 'price', 'subcategory_id'];

    //Relación uno a muchos inversa product - subcategory
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    //Relación uno a muchos product - variants
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    // Relación muchos a muchos product - options
    public function options()
    {
        return $this->belongsToMany(Option::class)
            ->withPivot('value') // Si se quiere incluir el valor de la opción en la tabla pivote
            ->withTimestamps(); // Si se quiere incluir timestamps en la tabla pivote
    }


}
