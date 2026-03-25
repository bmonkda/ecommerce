<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    Use HasFactory;
    
    // asignación masiva
    protected $fillable = ['name'];

    // relación uno a muchos family - category
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
