<?php

namespace App\Models\Admin;

use App\Helpers\Filterable;
use App\Models\Admin\AttrFloor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Floor extends Model
{

    use HasFactory, Filterable;
    protected $table = 'floors';
    protected $fillable = [
        'floor_name',
        'floor_value',
        'floor_attr_type',
        'floor_position',
        'is_structure'
    ];

    const TYPE_FLOOR_DEFAULT = 1;
    const TYPE_FLOOR_NORMAL = 2;

    //================================================Relations================================
    public function attrFloors(): HasMany
    {
        return $this->HasMany(AttrFloor::class, 'id_floor_master');
    }

    //================================================Filter===================================
    public function filterName($query, $value)
    {
        return $query->where("floor_name", "LIKE", "%" . $value . "%");
    }

    //================================================Query================================
    /**
     * get last position image
     *
     * @param [string] $type
     * @return void
     */
    public function getPositionLasted()
    {
        $postion = 1;
        $item = $this
            ->orderBy("floor_position", 'DESC')
            ->first();
        if ($item && $item->floor_position >= 1) {
            $postion = $item->floor_position + 1;
        }
        return $postion;
    }
}
