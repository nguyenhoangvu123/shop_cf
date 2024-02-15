<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryContruction extends Model
{
    use HasFactory;
    protected $table = 'price_desgins';
    protected $fillable = [
        'name',
        'price',
        'id_desgin',
        'id_contruction',
        'is_default',
        'id_floor_attrs'
    ];

    /**
     * Interact with the user's first name.
     */
    protected function idFloorAttrs(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value),
            set: fn ($value) => json_encode($value),
        );
    }
}
