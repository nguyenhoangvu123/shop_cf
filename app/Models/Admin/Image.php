<?php

namespace App\Models\Admin;

use App\Helpers\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory, Filterable;
    protected $table = 'images';
    protected $fillable = [
        'image_link',
        'image_type',
        'image_status',
        'image_position'
    ];

    const FILE_UPLOAD_SLIDER  = 'image/slider';
    const TYPE_IMAGE_SLIDER = 'slider';
    const TYPE_SHOW = 1;


    /**
     * get last position image
     *
     * @param [string] $type
     * @return void
     */
    public function getPositionLasted($type)
    {
        $postion = 1;
        $item = $this->where("image_type", $type)
            ->orderBy("image_position", 'DESC')
            ->first();
        if ($item && $item->image_position >= 1) {
            $postion = $item->image_position + 1;
        }
        return $postion;
    }
}
