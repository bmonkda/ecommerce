<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    // asignación masiva
    protected $fillable = ['sku', 'image_path', 'product_id'];

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
