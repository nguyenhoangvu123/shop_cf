<?php

namespace App\Models\Admin;

use App\Models\Admin\Post;
use App\Helpers\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, Filterable;
    protected $table = 'categories';
    protected $fillable = [
        'category_name',
        'category_slug',
        'parent_id',
        'status',
        'position_show',
        'category_type'
    ];

    const POSITION_SHOW_MENU = 'menu';
    const POSITION_SHOW_FOOTER = 'footer';
    const POSITION_SHOW_DETAIL = 'detail';
    const STATUS_SHOW = 1;
    const CATEGORY_HARD_CUSTOMER = 'hard-khach-hang';
    const CATEGORY_HARD_PARTNER = 'hard-doi-tac';

    //================================================Relations================================
    public function parent(): BelongsTo
    {
        return $this->BelongsTo(Category::class, 'parent_id');
    }

    public function childrens(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
    }


    //================================================Filter===================================
    public function filterName($query, $value)
    {
        return $query->where("category_name", "LIKE", "%" . $value . "%");
    }

    public function filterStatus($query, $value)
    {
        return $query->where("status", $value);
    }

    public function filterPosition($query, $value)
    {
        return $query->where("position_show", $value);
    }
}
