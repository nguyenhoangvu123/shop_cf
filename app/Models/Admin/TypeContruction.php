<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\CategoryContruction;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeContruction extends Model
{
    use HasFactory;
    protected $table = 'type_contruction';
    protected $fillable = [
        'contruction_name'
    ];

     //================================================Relations================================
     public function categories(): HasMany
     {
         return $this->HasMany(CategoryContruction::class, 'id_contruction');
     }
}
