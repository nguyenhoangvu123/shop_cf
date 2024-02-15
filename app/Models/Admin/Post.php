<?php

namespace App\Models\Admin;

use App\Helpers\Filterable;
use App\Models\Admin\Comment;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Filterable;
    protected $table = 'posts';
    protected $fillable = [
        'category_id',
        'post_title',
        'post_sub_title',
        'post_slug',
        'post_image',
        'post_description',
        'type',
        'status'
    ];
    const SHOW_STATUS = 1;
    const PATH_FILE_UPLOAD = 'post';

    //================================================Relations================================
    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class, 'category_id');
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'id_post');
    }
    //================================================Filter===================================
    public function filterTitle($query, $value)
    {
        return $query->where("post_title", "LIKE", "%" . $value . "%");
    }

    public function filterStatus($query, $value)
    {
        return $query->where("status", $value);
    }

    public function filterCategory($query, $value)
    {
        return $query->where("category_id", $value);
    }
}
