<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    // asignación masiva
    protected $fillable = [
        'value',
        'description',
        'option_id',
    ];
    
    // Relación uno a muchos inversa feature - option
    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    // Relación muchos a muchos feature - variant
    public function variants()
    {
        return $this->belongsToMany(Variant::class)
            ->withTimestamps();
    }   
}
