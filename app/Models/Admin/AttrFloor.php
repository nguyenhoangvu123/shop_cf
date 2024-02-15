<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttrFloor extends Model
{
    use HasFactory;

    protected $table = 'floor_attrs';
    protected $fillable = [
        'floor_attr_name',
        'id_floor_master',
        'value_expense',
        'value_desgin'
    ];

}
