<?php

namespace App\Models\Admin;

use App\Models\Admin\Post;
use App\Helpers\Filterable;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ConfigLayout extends Model
{
    use HasFactory, Filterable;
    protected $table = 'config_layouts';
    protected $fillable = [
        'config_name',
        'config_type_show',
        'config_type_slide',
        'config_image',
        'category_id',
        'config_status',
        'config_postion',
        'config_slug'
    ];
    const CONFIG_SELECT_CATEGORY = 0;
    const CONFIG_TYPE_SELECT_POST = 1;
    const CONFIG_SHOW = 1;
    const PATH_FILE_UPLOAD = 'config';
    //================================================Relations================================
    public function posts(): BelongsToMany
    {
        return $this->BelongsToMany(Post::class, 'layouts_posts', 'layout_id', 'post_id');
    }

    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class, 'category_id');
    }

    /**
     * get last position 
     *
     * @return void
     */
    public function getPositionLasted()
    {
        $postion = 1;
        $item = $this
            ->orderBy("config_postion", 'DESC')
            ->first();
        if ($item && $item->config_postion >= 1) {
            $postion = $item->config_postion + 1;
        }
        return $postion;
    }
}
