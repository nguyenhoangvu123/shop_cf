<?php

namespace App\Models\Admin;

use App\Helpers\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    use HasFactory, Filterable;
    protected $table = 'advices';
    protected $fillable = [
        'advice_name',
        'advice_title',
        'advice_email',
        'advice_phone',
        'advice_status',
        'advice_descr',
    ];

    const STATUS_DEFAULT = 0;

    //================================================Filter===================================

    public function filterStatus($query, $value)
    {
        return $query->where("advice_status", $value);
    }

    public function filterName($query, $value)
    {
        return $query->where("advice_name", "LIKE", "%" . $value . "%");
    }

    public function filterEmail($query, $value)
    {
        return $query->where("advice_email", "LIKE", "%" . $value . "%");
    }
}
