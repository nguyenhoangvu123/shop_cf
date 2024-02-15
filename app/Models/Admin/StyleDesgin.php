<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StyleDesgin extends Model
{
    use HasFactory;
    protected $table = 'style_design';
    protected $fillable = [
        'design_name'
    ];
}
