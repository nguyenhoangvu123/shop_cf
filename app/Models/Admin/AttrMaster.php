<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttrMaster extends Model
{
    use HasFactory;
    protected $table = 'attr_master';
    protected $fillable = [
        'attr_master_name',
        'attr_master_value',
        'type',
        'value'
    ];
    const TYPE_ATTRIBUTE_CONTRUCTION  = 1;
    const TYPE_ATTRIBUTE_SUPPLIES  = 2;

}
