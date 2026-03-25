<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    Use HasFactory;

    // asignación masiva
    protected $fillable = ['name', 'category_id'];
    
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
