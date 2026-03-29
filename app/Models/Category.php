<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    Use HasFactory;
    
    // asignación masiva
    protected $fillable = ['name', 'family_id'];

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
